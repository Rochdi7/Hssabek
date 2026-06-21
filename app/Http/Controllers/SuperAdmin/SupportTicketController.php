<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Support\StoreSupportTicketReplyRequest;
use App\Models\Support\SupportTicket;
use App\Models\Tenancy\Tenant;
use App\Notifications\SupportTicketReplyNotification;
use App\Notifications\SupportTicketStatusChangedNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SupportTicketController extends Controller
{
    public function index(Request $request): View
    {
        $query = SupportTicket::withoutGlobalScopes()
            ->with(['user', 'tenant'])
            ->withCount('replies');

        if ($search = $request->input('search')) {
            $query->where(function ($builder) use ($search) {
                $builder->where('subject', 'like', "%{$search}%")
                    ->orWhere('ticket_number', 'like', "%{$search}%");
            });
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        if ($priority = $request->input('priority')) {
            $query->where('priority', $priority);
        }

        if ($tenantId = $request->input('tenant_id')) {
            $query->where('tenant_id', $tenantId);
        }

        $tickets = $query->latest()->paginate(20)->withQueryString();
        $totalCount = SupportTicket::withoutGlobalScopes()->count();
        $openCount = SupportTicket::withoutGlobalScopes()->where('status', 'open')->count();
        $tenants = Tenant::orderBy('name')->get(['id', 'name']);

        return view('backoffice.superadmin.support-tickets.index', compact('tickets', 'totalCount', 'openCount', 'tenants'));
    }

    public function show(string $id): View
    {
        $ticket = SupportTicket::withoutGlobalScopes()
            ->with(['user', 'tenant', 'replies.user', 'media'])
            ->findOrFail($id);

        return view('backoffice.superadmin.support-tickets.show', compact('ticket'));
    }

    public function reply(StoreSupportTicketReplyRequest $request, string $id): RedirectResponse
    {
        $ticket = SupportTicket::withoutGlobalScopes()->findOrFail($id);

        $ticket->replies()->create([
            'user_id' => auth()->id(),
            'message' => $request->validated('message'),
            'is_admin_reply' => true,
        ]);

        if ($ticket->status === 'open') {
            $ticket->update(['status' => 'in_progress']);
        }

        $ticket->user->notify(new SupportTicketReplyNotification($ticket, isAdminReply: true));

        return back()->with('success', __('Reponse envoyee avec succes.'));
    }

    public function updateStatus(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'status' => ['required', 'in:open,in_progress,on_hold,resolved,closed'],
        ]);

        $ticket = SupportTicket::withoutGlobalScopes()->findOrFail($id);

        $data = ['status' => $request->status];

        if ($request->status === 'resolved') {
            $data['resolved_at'] = now();
        } elseif ($request->status === 'closed') {
            $data['closed_at'] = now();
        }

        $ticket->update($data);
        $ticket->user->notify(new SupportTicketStatusChangedNotification($ticket, $request->status));

        return back()->with('success', __('Statut mis a jour avec succes.'));
    }

    public function attachment(Request $request, string $ticket, Media $media): BinaryFileResponse
    {
        $supportTicket = SupportTicket::withoutGlobalScopes()->findOrFail($ticket);
        $this->ensureMediaBelongsToTicket($supportTicket, $media);

        $downloadName = $media->getCustomProperty('original_name', $media->file_name);

        if ($request->boolean('download')) {
            return response()->download($media->getPath(), $downloadName);
        }

        return response()->file($media->getPath(), [
            'Content-Disposition' => 'inline; filename="' . addslashes($downloadName) . '"',
        ]);
    }

    private function ensureMediaBelongsToTicket(SupportTicket $ticket, Media $media): void
    {
        abort_unless(
            $media->model_type === SupportTicket::class
            && (string) $media->model_id === (string) $ticket->getKey()
            && $media->collection_name === 'attachments',
            404
        );
    }
}
