<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\System\Announcement;
use App\Models\User;
use App\Notifications\AnnouncementNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::with('author')
            ->orderByDesc('created_at')
            ->paginate(15);

        $totalAnnouncements = Announcement::count();
        $activeAnnouncements = Announcement::active()->count();

        return view('backoffice.superadmin.announcements.index', compact(
            'announcements',
            'totalAnnouncements',
            'activeAnnouncements'
        ));
    }

    public function create()
    {
        return view('backoffice.superadmin.announcements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:5000',
            'type' => 'required|in:info,warning,success,danger',
            'is_active' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'expires_at' => 'nullable|date|after_or_equal:published_at',
        ], [
            'title.required' => 'Le titre est obligatoire.',
            'title.max' => 'Le titre ne doit pas dépasser 255 caractères.',
            'content.required' => 'Le contenu est obligatoire.',
            'content.max' => 'Le contenu ne doit pas dépasser 5000 caractères.',
            'type.required' => 'Le type est obligatoire.',
            'type.in' => 'Le type doit être info, avertissement, succès ou danger.',
            'expires_at.after_or_equal' => 'La date d\'expiration doit être postérieure à la date de publication.',
        ]);

        $announcement = Announcement::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'type' => $validated['type'],
            'is_active' => $request->boolean('is_active'),
            'published_at' => $validated['published_at'] ?? now(),
            'expires_at' => $validated['expires_at'] ?? null,
            'created_by' => auth()->id(),
        ]);

        // Notify all tenant users (users with a tenant_id)
        if ($announcement->is_active) {
            $tenantUsers = User::whereNotNull('tenant_id')->get();
            Notification::send($tenantUsers, new AnnouncementNotification($announcement));
        }

        return redirect()->route('sa.announcements.index')
            ->with('success', __('L\'annonce a été créée avec succès.'));
    }

    public function edit(Announcement $announcement)
    {
        return view('backoffice.superadmin.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:5000',
            'type' => 'required|in:info,warning,success,danger',
            'is_active' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'expires_at' => 'nullable|date|after_or_equal:published_at',
        ], [
            'title.required' => 'Le titre est obligatoire.',
            'content.required' => 'Le contenu est obligatoire.',
            'type.required' => 'Le type est obligatoire.',
            'expires_at.after_or_equal' => 'La date d\'expiration doit être postérieure à la date de publication.',
        ]);

        $announcement->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'type' => $validated['type'],
            'is_active' => $request->boolean('is_active'),
            'published_at' => $validated['published_at'] ?? $announcement->published_at,
            'expires_at' => $validated['expires_at'] ?? null,
        ]);

        return redirect()->route('sa.announcements.index')
            ->with('success', __("L'annonce « {$announcement->title} » a été mise à jour avec succès."));
    }

    public function destroy(Announcement $announcement)
    {
        $title = $announcement->title;
        $announcement->delete();

        return redirect()->route('sa.announcements.index')
            ->with('success', __("L'annonce « {$title} » a été supprimée avec succès."));
    }
}
