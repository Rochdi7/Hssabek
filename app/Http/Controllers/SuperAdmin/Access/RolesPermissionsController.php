<?php

namespace App\Http\Controllers\SuperAdmin\Access;

use App\Http\Controllers\Controller;
use App\Http\Requests\Access\RoleStoreRequest;
use App\Http\Requests\Access\RoleUpdateRequest;
use App\Http\Requests\Access\RoleSyncPermissionsRequest;
use App\Http\Requests\Access\PermissionStoreRequest;
use App\Http\Requests\Access\PermissionUpdateRequest;
use App\Models\Tenancy\Permission;
use App\Models\Tenancy\Role;
use App\Models\Tenancy\Tenant;
use Illuminate\Http\Request;

class RolesPermissionsController extends Controller
{
    /**
     * Display roles list — SuperAdmin sees ALL roles (optionally filtered by tenant).
     */
    public function index(Request $request)
    {
        $query = Role::query();

        // Filter by tenant if requested
        if ($tenantId = $request->get('tenant_id')) {
            $query->where('tenant_id', $tenantId);
        }

        if ($search = $request->get('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        $roles = $query->orderBy('tenant_id')->orderBy('created_at', 'desc')->paginate(20);
        $tenants = Tenant::orderBy('name')->get();

        return view('backoffice.superadmin.roles-permissions.index', compact('roles', 'tenants'));
    }

    /**
     * Store a new role (SuperAdmin can assign any tenant or global).
     */
    public function storeRole(RoleStoreRequest $request)
    {
        Role::create([
            'name'       => $request->validated('name'),
            'guard_name' => 'web',
            'tenant_id'  => $request->validated('tenant_id'), // nullable = global
        ]);

        return redirect()
            ->route('sa.access.roles.index')
            ->with('success', __('Role created successfully.'));
    }

    /**
     * Update a role.
     */
    public function updateRole(RoleUpdateRequest $request, Role $role)
    {
        $role->update([
            'name'      => $request->validated('name'),
            'tenant_id' => $request->validated('tenant_id'),
        ]);

        return redirect()
            ->route('sa.access.roles.index')
            ->with('success', __('Role updated successfully.'));
    }

    /**
     * Delete a role.
     */
    public function destroyRole(Role $role)
    {
        $role->delete();

        return redirect()
            ->route('sa.access.roles.index')
            ->with('success', __('Role deleted successfully.'));
    }

    /**
     * Show permissions assignment page for a given role.
     */
    public function permissions(Role $role)
    {
        $allPermissions = Permission::where('tenant_id', null)
            ->orderBy('name')
            ->get();

        $grouped = $this->groupPermissions($allPermissions);
        $rolePermissionIds = $role->permissions()->pluck('permissions.id')->toArray();

        // All roles for the switcher dropdown
        $roles = Role::orderBy('tenant_id')->orderBy('name')->get();

        return view('backoffice.superadmin.roles-permissions.permissions', compact(
            'role',
            'grouped',
            'rolePermissionIds',
            'roles'
        ));
    }

    /**
     * Sync permissions for any role.
     */
    public function syncPermissions(RoleSyncPermissionsRequest $request, Role $role)
    {
        $permissionIds = $request->validated('permissions', []);

        // SuperAdmin can assign any global permission
        $validPermissions = Permission::where('tenant_id', null)
            ->whereIn('id', $permissionIds)
            ->get();

        $role->syncPermissions($validPermissions);

        return redirect()
            ->route('sa.access.roles.permissions', $role)
            ->with('success', __('Permissions updated successfully.'));
    }

    /**
     * Display the global permissions catalog.
     */
    public function permissionsList(Request $request)
    {
        $allPermissions = Permission::where('tenant_id', null)
            ->orderBy('name')
            ->get();

        $grouped = $this->groupPermissions($allPermissions);

        return view('backoffice.superadmin.roles-permissions.permissions-list', compact('grouped'));
    }

    /**
     * Create a new global permission.
     */
    public function storePermission(PermissionStoreRequest $request)
    {
        Permission::create([
            'name'       => $request->validated('name'),
            'guard_name' => 'web',
            'tenant_id'  => null, // always global
        ]);

        return redirect()
            ->route('sa.access.permissions.index')
            ->with('success', __('Permission created successfully.'));
    }

    /**
     * Update a global permission.
     */
    public function updatePermission(PermissionUpdateRequest $request, Permission $permission)
    {
        $permission->update([
            'name' => $request->validated('name'),
        ]);

        return redirect()
            ->route('sa.access.permissions.index')
            ->with('success', __('Permission updated successfully.'));
    }

    /**
     * Delete a global permission.
     */
    public function destroyPermission(Permission $permission)
    {
        $permission->delete();

        return redirect()
            ->route('sa.access.permissions.index')
            ->with('success', __('Permission deleted successfully.'));
    }

    /**
     * Group permissions by category → module → actions.
     */
    protected function groupPermissions($permissions): array
    {
        $grouped = [];

        foreach ($permissions as $permission) {
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
