<?php

namespace App\Http\Controllers\Backoffice\Access;

use App\Http\Controllers\Controller;
use App\Http\Requests\Access\RoleStoreRequest;
use App\Http\Requests\Access\RoleUpdateRequest;
use App\Http\Requests\Access\RoleSyncPermissionsRequest;
use App\Models\Tenancy\Permission;
use App\Models\Tenancy\Role;
use Illuminate\Http\Request;

class RolesPermissionsController extends Controller
{
    /**
     * Display the roles list for the current tenant.
     */
    public function index(Request $request)
    {
        $tenantId = auth()->user()->tenant_id;

        $query = Role::where('tenant_id', $tenantId);

        if ($search = $request->get('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        $roles = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('backoffice.roles-permissions.index', compact('roles'));
    }

    /**
     * Store a new role for the current tenant.
     */
    public function store(RoleStoreRequest $request)
    {
        Role::create([
            'name'       => $request->validated('name'),
            'guard_name' => 'web',
            'tenant_id'  => auth()->user()->tenant_id,
        ]);

        return redirect()
            ->route('bo.access.roles.index')
            ->with('success', __('Rôle créé avec succès.'));
    }

    /**
     * Update a tenant role.
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        // Ensure role belongs to this tenant
        abort_unless($role->tenant_id === auth()->user()->tenant_id, 404);

        $role->update([
            'name' => $request->validated('name'),
        ]);

        return redirect()
            ->route('bo.access.roles.index')
            ->with('success', __('Rôle mis à jour avec succès.'));
    }

    /**
     * Delete a tenant role.
     */
    public function destroy(Role $role)
    {
        // Ensure role belongs to this tenant
        abort_unless($role->tenant_id === auth()->user()->tenant_id, 404);

        $role->delete();

        return redirect()
            ->route('bo.access.roles.index')
            ->with('success', __('Rôle supprimé avec succès.'));
    }

    /**
     * Show the permissions assignment page for a specific role.
     */
    public function permissions(Role $role)
    {
        $tenantId = auth()->user()->tenant_id;

        // Ensure role belongs to this tenant
        abort_unless($role->tenant_id === $tenantId, 404);

        // Get all global permissions grouped by group.module
        $allPermissions = Permission::where('tenant_id', null)
            ->orderBy('name')
            ->get();

        // Group permissions by category (e.g., "sales", "inventory", etc.)
        $grouped = $this->groupPermissions($allPermissions);

        // Get currently assigned permission IDs for this role
        $rolePermissionIds = $role->permissions()->pluck('permissions.id')->toArray();

        // Get all tenant roles for the role switcher dropdown
        $roles = Role::where('tenant_id', $tenantId)->orderBy('name')->get();

        return view('backoffice.roles-permissions.permissions', compact(
            'role',
            'grouped',
            'rolePermissionIds',
            'roles'
        ));
    }

    /**
     * Sync permissions for a tenant role.
     */
    public function syncPermissions(RoleSyncPermissionsRequest $request, Role $role)
    {
        // Ensure role belongs to this tenant
        abort_unless($role->tenant_id === auth()->user()->tenant_id, 404);

        $permissionIds = $request->validated('permissions', []);

        // Ensure all submitted permissions are global (tenant_id = null)
        $validPermissions = Permission::where('tenant_id', null)
            ->whereIn('id', $permissionIds)
            ->pluck('id')
            ->toArray();

        $role->syncPermissions(
            Permission::whereIn('id', $validPermissions)->get()
        );

        return redirect()
            ->route('bo.access.roles.permissions', $role)
            ->with('success', __('Permissions mises à jour avec succès.'));
    }

    /**
     * Read-only permissions catalog list for tenant admin.
     */
    public function permissionsList(Request $request)
    {
        $allPermissions = Permission::where('tenant_id', null)
            ->orderBy('name')
            ->get();

        $grouped = $this->groupPermissions($allPermissions);

        return view('backoffice.roles-permissions.permissions-list', compact('grouped'));
    }

    /**
     * Group permissions by category → module → actions.
     */
    protected function groupPermissions($permissions): array
    {
        $grouped = [];

        foreach ($permissions as $permission) {
            // Permission name format: "group.module.action"
            $parts = explode('.', $permission->name);
            if (count($parts) !== 3) {
                continue;
            }

            [$group, $module, $action] = $parts;

            if (!isset($grouped[$group])) {
                $grouped[$group] = [];
            }
            if (!isset($grouped[$group][$module])) {
                $grouped[$group][$module] = [];
            }

            $grouped[$group][$module][$action] = $permission;
        }

        return $grouped;
    }
}
