<?php

namespace App\Http\Controllers\Backoffice\Support;

use App\Http\Controllers\Controller;
use App\Http\Requests\Support\StoreSupportTicketReplyRequest;
use App\Http\Requests\Support\StoreSupportTicketRequest;
use App\Models\Support\SupportTicket;
use App\Models\User;
use App\Notifications\SupportTicketCreatedNotification;
use App\Notifications\SupportTicketReplyNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SupportTicketController extends Controller
{
    public function index(Request $request): View
    {
        $query = $this->visibleTicketsQuery();

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

        $tickets = $query->latest()->paginate(15)->withQueryString();

        $countQuery = $this->visibleTicketsQuery();
        $totalCount = (clone $countQuery)->count();
        $openCount = (clone $countQuery)->where('status', 'open')->count();
        $inProgressCount = (clone $countQuery)->where('status', 'in_progress')->count();
        $resolvedCount = (clone $countQuery)->where('status', 'resolved')->count();
        $closedCount = (clone $countQuery)->where('status', 'closed')->count();

        return view('backoffice.support.tickets.index', compact(
            'tickets',
            'totalCount',
            'openCount',
            'inProgressCount',
            'resolvedCount',
            'closedCount'
        ));
    }

    public function create(): View
    {
        return view('backoffice.support.tickets.create');
    }

    public function store(StoreSupportTicketRequest $request): RedirectResponse
    {
        $ticket = SupportTicket::create($request->safe()->except('attachments'));

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $originalName = $this->sanitizeOriginalFileName($file->getClientOriginalName());

                $ticket->addMedia($file)
                    ->usingName(pathinfo($originalName, PATHINFO_FILENAME))
                    ->withCustomProperties(['original_name' => $originalName])
                    ->toMediaCollection('attachments');
            }
        }

        $superAdmins = User::whereNull('tenant_id')->get();
        Notification::send($superAdmins, new SupportTicketCreatedNotification($ticket));

        return redirect()->route('bo.support.tickets.index')
            ->with('success', __('Ticket cree avec succes. Notre equipe vous repondra dans les plus brefs delais.'));
    }

    public function show(SupportTicket $ticket): View
    {
        $this->authorizeTicketAccess($ticket);

        $ticket->load(['user', 'replies.user', 'media']);

        return view('backoffice.support.tickets.show', compact('ticket'));
    }

    public function reply(StoreSupportTicketReplyRequest $request, SupportTicket $ticket): RedirectResponse
    {
        $this->authorizeTicketAccess($ticket);

        $ticket->replies()->create([
            'user_id' => auth()->id(),
            'message' => $request->validated('message'),
            'is_admin_reply' => false,
        ]);

        if (in_array($ticket->status, ['resolved', 'closed'], true)) {
            $ticket->update(['status' => 'open', 'resolved_at' => null, 'closed_at' => null]);
        }

        $superAdmins = User::whereNull('tenant_id')->get();
        Notification::send($superAdmins, new SupportTicketReplyNotification($ticket, isAdminReply: false));

        return back()->with('success', __('Reponse envoyee avec succes.'));
    }

    public function attachment(Request $request, SupportTicket $ticket, Media $media): BinaryFileResponse
    {
        $this->authorizeTicketAccess($ticket);
        $this->ensureMediaBelongsToTicket($ticket, $media);

        $downloadName = $media->getCustomProperty('original_name', $media->file_name);

        if ($request->boolean('download')) {
            return response()->download($media->getPath(), $downloadName);
        }

        return response()->file($media->getPath(), [
            'Content-Disposition' => 'inline; filename="' . addslashes($downloadName) . '"',
        ]);
    }

    private function visibleTicketsQuery(): Builder
    {
        $query = SupportTicket::query()->with('user')->withCount('replies');
        $user = auth()->user();

        if (! $user || ! $this->isTenantSupportAdmin($user)) {
            $query->where('user_id', auth()->id());
        }

        return $query;
    }

    private function authorizeTicketAccess(SupportTicket $ticket): void
    {
        abort_unless($this->currentUserCanAccessTicket($ticket), 403);
    }

    private function currentUserCanAccessTicket(SupportTicket $ticket): bool
    {
        $user = auth()->user();

        if (! $user) {
            return false;
        }

        if ($this->isTenantSupportAdmin($user)) {
            return true;
        }

        return (string) $ticket->user_id === (string) $user->getKey();
    }

    private function isTenantSupportAdmin(User $user): bool
    {
        return $user->tenant_id === null || $user->hasRole('admin') || $user->hasRole('owner');
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

    private function sanitizeOriginalFileName(string $fileName): string
    {
        $safeName = basename(str_replace('\\', '/', $fileName));
        $extension = strtolower(pathinfo($safeName, PATHINFO_EXTENSION));
        $baseName = trim(
            preg_replace('/[^A-Za-z0-9._-]+/', '-', Str::ascii(pathinfo($safeName, PATHINFO_FILENAME) ?: 'attachment')) ?: 'attachment',
            '-._'
        );

        if ($baseName === '') {
            $baseName = 'attachment';
        }

        return $extension !== '' ? "{$baseName}.{$extension}" : $baseName;
    }
}
