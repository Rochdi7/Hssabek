<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\System\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsletterController extends Controller
{
    public function index(Request $request): View
    {
        $query = NewsletterSubscriber::query()->latest();

        if ($search = $request->input('search')) {
            $query->where('email', 'like', "%{$search}%");
        }

        if ($request->has('status')) {
            $status = $request->input('status');
            if ($status === 'active') {
                $query->where('is_active', true);
            } elseif ($status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $subscribers  = $query->paginate(20)->withQueryString();
        $totalCount   = NewsletterSubscriber::count();
        $activeCount  = NewsletterSubscriber::where('is_active', true)->count();

        return view('backoffice.superadmin.newsletter.index', compact('subscribers', 'totalCount', 'activeCount'));
    }

    public function destroy(NewsletterSubscriber $subscriber): RedirectResponse
    {
        $subscriber->delete();

        return redirect()
            ->route('sa.newsletter.index')
            ->with('success', 'Abonné supprimé avec succès.');
    }

    public function toggleStatus(NewsletterSubscriber $subscriber): RedirectResponse
    {
        if ($subscriber->is_active) {
            $subscriber->unsubscribe();
            $message = 'Abonné désactivé avec succès.';
        } else {
            $subscriber->update([
                'is_active'       => true,
                'unsubscribed_at' => null,
            ]);
            $message = 'Abonné réactivé avec succès.';
        }

        return back()->with('success', $message);
    }

    public function export()
    {
        $subscribers = NewsletterSubscriber::where('is_active', true)
            ->orderBy('email')
            ->pluck('email');

        $content = $subscribers->implode("\n");

        return response($content, 200, [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="newsletter-subscribers-' . date('Y-m-d') . '.csv"',
        ]);
    }
}
