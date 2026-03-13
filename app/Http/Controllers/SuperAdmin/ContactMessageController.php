<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\System\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    public function index(Request $request): View
    {
        $query = ContactMessage::query()->latest();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        if ($subject = $request->input('subject')) {
            $query->where('subject', $subject);
        }

        $messages   = $query->paginate(20)->withQueryString();
        $totalCount = ContactMessage::count();
        $newCount   = ContactMessage::where('status', 'new')->count();

        return view('backoffice.superadmin.contact-messages.index', compact('messages', 'totalCount', 'newCount'));
    }

    public function show(ContactMessage $contactMessage): View
    {
        if ($contactMessage->status === 'new') {
            $contactMessage->markAsRead();
        }

        return view('backoffice.superadmin.contact-messages.show', compact('contactMessage'));
    }

    public function updateStatus(Request $request, ContactMessage $contactMessage): RedirectResponse
    {
        $request->validate([
            'status' => ['required', 'in:new,read,replied,archived'],
        ]);

        $contactMessage->update(['status' => $request->status]);

        return back()->with('success', __('Statut mis à jour avec succès.'));
    }

    public function destroy(ContactMessage $contactMessage): RedirectResponse
    {
        $contactMessage->delete();

        return redirect()
            ->route('sa.contact-messages.index')
            ->with('success', __('Message supprimé avec succès.'));
    }
}
