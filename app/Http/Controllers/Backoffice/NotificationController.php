<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\System\Announcement;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display all notifications.
     */
    public function index(Request $request)
    {
        $notifications = $request->user()
            ->notifications()
            ->paginate(20);

        // System notifications (from Laravel's notification system)
        $systemNotifications = $request->user()
            ->notifications()
            ->paginate(15, ['*'], 'system_page');

        // Admin announcements (from super admin)
        $announcements = Announcement::active()
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->get();

        return view('backoffice.notifications.index', compact('notifications', 'systemNotifications', 'announcements'));
    }

    /**
     * Mark a single notification as read.
     */
    public function markAsRead(Request $request, string $id)
    {
        $notification = $request->user()
            ->notifications()
            ->findOrFail($id);

        $notification->markAsRead();

        return back()->with('success', __('Notification marquée comme lue.'));
    }

    /**
     * Mark all notifications as read.
     */
    public function markAllAsRead(Request $request)
    {
        $request->user()->unreadNotifications->markAsRead();

        return back()->with('success', __('Toutes les notifications ont été marquées comme lues.'));
    }

    /**
     * Delete a single notification.
     */
    public function destroy(Request $request, string $id)
    {
        $request->user()
            ->notifications()
            ->findOrFail($id)
            ->delete();

        return back()->with('success', __('Notification supprimée.'));
    }

    /**
     * Delete all notifications.
     */
    public function destroyAll(Request $request)
    {
        $request->user()->notifications()->delete();

        return back()->with('success', __('Toutes les notifications ont été supprimées.'));
    }
}
