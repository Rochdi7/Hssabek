<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\System\Announcement;
use App\Models\User;
use App\Notifications\AnnouncementNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

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
            'title_fr'     => 'required|string|max:255',
            'title_ar'     => 'nullable|string|max:255',
            'title_en'     => 'nullable|string|max:255',
            'content_fr'   => 'required|string|max:10000',
            'content_ar'   => 'nullable|string|max:10000',
            'content_en'   => 'nullable|string|max:10000',
            'type'         => 'required|in:info,warning,success,danger',
            'is_active'    => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'expires_at'   => 'nullable|date|after_or_equal:published_at',
            'attachment'   => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp,doc,docx|max:5120',
        ], [
            'title_fr.required'   => 'Le titre en français est obligatoire.',
            'title_fr.max'        => 'Le titre ne doit pas dépasser 255 caractères.',
            'content_fr.required' => 'Le contenu en français est obligatoire.',
            'content_fr.max'      => 'Le contenu ne doit pas dépasser 10000 caractères.',
            'type.required'       => 'Le type est obligatoire.',
            'type.in'             => 'Le type doit être info, avertissement, succès ou danger.',
            'expires_at.after_or_equal' => 'La date d\'expiration doit être postérieure à la date de publication.',
            'attachment.mimes'    => 'La pièce jointe doit être un fichier PDF, image ou document Word.',
            'attachment.max'      => 'La pièce jointe ne doit pas dépasser 5 Mo.',
        ]);

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('announcements/attachments', 'public');
        }

        $announcement = Announcement::create([
            'title'        => $validated['title_fr'],
            'title_fr'     => $validated['title_fr'],
            'title_ar'     => $validated['title_ar'] ?? null,
            'title_en'     => $validated['title_en'] ?? null,
            'content'      => $validated['content_fr'],
            'content_fr'   => $validated['content_fr'],
            'content_ar'   => $validated['content_ar'] ?? null,
            'content_en'   => $validated['content_en'] ?? null,
            'type'         => $validated['type'],
            'is_active'    => $request->boolean('is_active'),
            'published_at' => $validated['published_at'] ?? now(),
            'expires_at'   => $validated['expires_at'] ?? null,
            'attachment'   => $attachmentPath,
            'created_by'   => auth()->id(),
        ]);

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
            'title_fr'     => 'required|string|max:255',
            'title_ar'     => 'nullable|string|max:255',
            'title_en'     => 'nullable|string|max:255',
            'content_fr'   => 'required|string|max:10000',
            'content_ar'   => 'nullable|string|max:10000',
            'content_en'   => 'nullable|string|max:10000',
            'type'         => 'required|in:info,warning,success,danger',
            'is_active'    => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'expires_at'   => 'nullable|date|after_or_equal:published_at',
            'attachment'   => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp,doc,docx|max:5120',
        ], [
            'title_fr.required'   => 'Le titre en français est obligatoire.',
            'content_fr.required' => 'Le contenu en français est obligatoire.',
            'type.required'       => 'Le type est obligatoire.',
            'expires_at.after_or_equal' => 'La date d\'expiration doit être postérieure à la date de publication.',
            'attachment.mimes'    => 'La pièce jointe doit être un fichier PDF, image ou document Word.',
            'attachment.max'      => 'La pièce jointe ne doit pas dépasser 5 Mo.',
        ]);

        $attachmentPath = $announcement->attachment;
        if ($request->hasFile('attachment')) {
            // Delete old attachment
            if ($attachmentPath) {
                Storage::disk('public')->delete($attachmentPath);
            }
            $attachmentPath = $request->file('attachment')->store('announcements/attachments', 'public');
        } elseif ($request->boolean('remove_attachment')) {
            if ($attachmentPath) {
                Storage::disk('public')->delete($attachmentPath);
            }
            $attachmentPath = null;
        }

        $announcement->update([
            'title'        => $validated['title_fr'],
            'title_fr'     => $validated['title_fr'],
            'title_ar'     => $validated['title_ar'] ?? null,
            'title_en'     => $validated['title_en'] ?? null,
            'content'      => $validated['content_fr'],
            'content_fr'   => $validated['content_fr'],
            'content_ar'   => $validated['content_ar'] ?? null,
            'content_en'   => $validated['content_en'] ?? null,
            'type'         => $validated['type'],
            'is_active'    => $request->boolean('is_active'),
            'published_at' => $validated['published_at'] ?? $announcement->published_at,
            'expires_at'   => $validated['expires_at'] ?? null,
            'attachment'   => $attachmentPath,
        ]);

        return redirect()->route('sa.announcements.index')
            ->with('success', __("L'annonce a été mise à jour avec succès."));
    }

    public function destroy(Announcement $announcement)
    {
        if ($announcement->attachment) {
            Storage::disk('public')->delete($announcement->attachment);
        }
        $announcement->delete();

        return redirect()->route('sa.announcements.index')
            ->with('success', __('L\'annonce a été supprimée avec succès.'));
    }
}
