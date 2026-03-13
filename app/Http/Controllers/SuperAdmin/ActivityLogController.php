<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\System\ActivityLog;
use App\Models\Tenancy\Tenant;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $query = ActivityLog::with(['tenant', 'user'])
            ->orderByDesc('created_at');

        // Filter by tenant
        if ($request->filled('tenant_id')) {
            $query->where('tenant_id', $request->tenant_id);
        }

        // Filter by action
        if ($request->filled('action')) {
            $query->where('action', $request->action);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Search by user name, action, or subject type
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('action', 'like', "%{$search}%")
                    ->orWhere('subject_type', 'like', "%{$search}%")
                    ->orWhere('ip', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            });
        }

        $logs = $query->paginate(25)->withQueryString();

        $totalLogs = ActivityLog::count();
        $todayLogs = ActivityLog::whereDate('created_at', today())->count();
        $tenants = Tenant::orderBy('name')->get(['id', 'name']);
        $actions = ActivityLog::distinct()->pluck('action')->filter()->sort()->values();

        return view('backoffice.superadmin.activity-logs.index', compact(
            'logs',
            'totalLogs',
            'todayLogs',
            'tenants',
            'actions'
        ));
    }

    public function show(ActivityLog $activityLog)
    {
        $activityLog->load(['tenant', 'user', 'subject']);

        return view('backoffice.superadmin.activity-logs.show', compact('activityLog'));
    }

    public function destroy(ActivityLog $activityLog)
    {
        $activityLog->delete();

        return redirect()->route('sa.activity-logs.index')
            ->with('success', __('L\'entrée du journal d\'activité a été supprimée avec succès.'));
    }

    public function clear(Request $request)
    {
        $request->validate([
            'before_date' => 'required|date|before:today',
        ], [
            'before_date.required' => 'La date est obligatoire.',
            'before_date.date' => 'La date n\'est pas valide.',
            'before_date.before' => 'La date doit être antérieure à aujourd\'hui.',
        ]);

        $deleted = ActivityLog::where('created_at', '<', $request->before_date)->delete();

        return redirect()->route('sa.activity-logs.index')
            ->with('success', __("{$deleted} entrées du journal ont été supprimées avec succès."));
    }
}
