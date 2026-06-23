<?php

namespace App\Http\Controllers\Backoffice\Access;

use App\Http\Controllers\Controller;
use App\Http\Requests\Access\RoleStoreRequest;
use App\Http\Requests\Access\RoleSyncPermissionsRequest;
use App\Http\Requests\Access\RoleUpdateRequest;
use App\Models\Tenancy\Permission;
use App\Models\Tenancy\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\PermissionRegistrar;

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
            'name' => $request->validated('name'),
            'guard_name' => 'web',
            'tenant_id' => auth()->user()->tenant_id,
        ]);

        return redirect()
            ->route('bo.access.roles.index')
            ->with('success', __('permissions.messages.role_created'));
    }

    /**
     * Update a tenant role.
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        abort_unless($role->tenant_id === auth()->user()->tenant_id, 404);

        $role->update([
            'name' => $request->validated('name'),
        ]);

        return redirect()
            ->route('bo.access.roles.index')
            ->with('success', __('permissions.messages.role_updated'));
    }

    /**
     * Delete a tenant role.
     */
    public function destroy(Role $role)
    {
        abort_unless($role->tenant_id === auth()->user()->tenant_id, 404);

        $role->delete();

        return redirect()
            ->route('bo.access.roles.index')
            ->with('success', __('permissions.messages.role_deleted'));
    }

    /**
     * Show the permissions assignment page for a specific role.
     */
    public function permissions(Role $role)
    {
        $tenantId = auth()->user()->tenant_id;

        abort_unless($role->tenant_id === $tenantId, 404);

        $allPermissions = Permission::where('tenant_id', null)
            ->orderBy('name')
            ->get();

        $grouped = $this->groupPermissions($allPermissions);
        $actionColumns = $this->extractActionColumns($grouped);
        [$groupLabels, $moduleLabels, $actionLabels] = $this->buildPermissionLabels($grouped, $actionColumns);

        $rolePermissionIds = $role->permissions()->pluck('permissions.id')->toArray();
        $roles = Role::where('tenant_id', $tenantId)->orderBy('name')->get();

        return view('backoffice.roles-permissions.permissions', compact(
            'role',
            'grouped',
            'actionColumns',
            'groupLabels',
            'moduleLabels',
            'actionLabels',
            'rolePermissionIds',
            'roles',
        ));
    }

    /**
     * Sync permissions for a tenant role.
     */
    public function syncPermissions(RoleSyncPermissionsRequest $request, Role $role)
    {
        abort_unless($role->tenant_id === auth()->user()->tenant_id, 404);

        $permissionIds = $request->validated('permissions', []);

        $validPermissions = Permission::where('tenant_id', null)
            ->whereIn('id', $permissionIds)
            ->pluck('id')
            ->toArray();

        $role->syncPermissions(
            Permission::whereIn('id', $validPermissions)->get()
        );

        // Flush the Spatie permission cache so new permissions apply immediately.
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        return redirect()
            ->route('bo.access.roles.permissions', $role)
            ->with('success', __('permissions.messages.permissions_updated'));
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
        $actionColumns = $this->extractActionColumns($grouped);
        [$groupLabels, $moduleLabels, $actionLabels] = $this->buildPermissionLabels($grouped, $actionColumns);

        return view('backoffice.roles-permissions.permissions-list', compact(
            'grouped',
            'actionColumns',
            'groupLabels',
            'moduleLabels',
            'actionLabels',
        ));
    }

    protected function groupPermissions($permissions): array
    {
        $grouped = [];

        foreach ($permissions as $permission) {
            $parts = explode('.', $permission->name);
            $action = array_pop($parts);

            if (! $action || empty($parts)) {
                continue;
            }

            $group = array_shift($parts);
            $module = implode('.', $parts);

            // Support 2-part permissions such as "dashboard.view".
            if ($module === '') {
                $module = $group;
            }

            if (! isset($grouped[$group])) {
                $grouped[$group] = [];
            }
            if (! isset($grouped[$group][$module])) {
                $grouped[$group][$module] = [];
            }

            $grouped[$group][$module][$action] = $permission;
        }

        return $grouped;
    }

    protected function extractActionColumns(array $grouped): array
    {
        $actions = [];

        foreach ($grouped as $modules) {
            foreach ($modules as $moduleActions) {
                foreach (array_keys($moduleActions) as $action) {
                    $actions[$action] = true;
                }
            }
        }

        $ordered = [];
        $preferred = ['create', 'edit', 'delete', 'view', 'export'];

        foreach ($preferred as $action) {
            if (isset($actions[$action])) {
                $ordered[] = $action;
                unset($actions[$action]);
            }
        }

        $remaining = array_keys($actions);
        sort($remaining);

        return [...$ordered, ...$remaining];
    }

    protected function buildPermissionLabels(array $grouped, array $actionColumns): array
    {
        $groupLabels = [];
        $moduleLabels = [];

        foreach ($grouped as $groupName => $modules) {
            $groupLabels[$groupName] = $this->translatePermissionSegment('groups', $groupName);

            foreach ($modules as $moduleName => $actions) {
                $moduleLabels[$moduleName] = $this->translatePermissionSegment('modules', $moduleName);
            }
        }

        $actionLabels = [];
        foreach ($actionColumns as $action) {
            $actionLabels[$action] = $this->translatePermissionSegment('actions', $action);
        }

        return [$groupLabels, $moduleLabels, $actionLabels];
    }

    protected function translatePermissionSegment(string $section, string $key): string
    {
        $translationKey = "permissions.{$section}.{$key}";
        $translated = __($translationKey);

        if ($translated !== $translationKey) {
            return $translated;
        }

        return Str::headline(str_replace(['_', '-'], ' ', $key));
    }
}
