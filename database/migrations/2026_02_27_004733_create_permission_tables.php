<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create Spatie Permission tables with:
     * - tenant_id (UUID, nullable) on roles & permissions for multi-tenancy
     * - UUID model_id on pivot tables (model_has_roles, model_has_permissions)
     * - Unique constraints: [tenant_id, name, guard_name]
     */
    public function up(): void
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        $pivotRole = $columnNames['role_pivot_key'] ?? 'role_id';
        $pivotPermission = $columnNames['permission_pivot_key'] ?? 'permission_id';

        throw_if(empty($tableNames), Exception::class, 'Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.');

        // ── permissions ──────────────────────────────────────────
        Schema::create($tableNames['permissions'], static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('tenant_id')->nullable();
            $table->string('name');
            $table->string('guard_name');
            $table->timestamps();

            $table->index('tenant_id');
            $table->unique(['tenant_id', 'name', 'guard_name']);
        });

        // ── roles ────────────────────────────────────────────────
        Schema::create($tableNames['roles'], static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('tenant_id')->nullable();
            $table->string('name');
            $table->string('guard_name');
            $table->timestamps();

            $table->index('tenant_id');
            $table->unique(['tenant_id', 'name', 'guard_name']);
        });

        // ── model_has_permissions (UUID model_id) ────────────────
        Schema::create($tableNames['model_has_permissions'], static function (Blueprint $table) use ($tableNames, $pivotPermission) {
            $table->unsignedBigInteger($pivotPermission);
            $table->string('model_type');
            $table->uuid('model_id');

            $table->index(['model_id', 'model_type'], 'model_has_permissions_model_id_model_type_index');

            $table->foreign($pivotPermission)
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->primary(
                [$pivotPermission, 'model_id', 'model_type'],
                'model_has_permissions_permission_model_type_primary'
            );
        });

        // ── model_has_roles (UUID model_id) ──────────────────────
        Schema::create($tableNames['model_has_roles'], static function (Blueprint $table) use ($tableNames, $pivotRole) {
            $table->unsignedBigInteger($pivotRole);
            $table->string('model_type');
            $table->uuid('model_id');

            $table->index(['model_id', 'model_type'], 'model_has_roles_model_id_model_type_index');

            $table->foreign($pivotRole)
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary(
                [$pivotRole, 'model_id', 'model_type'],
                'model_has_roles_role_model_type_primary'
            );
        });

        // ── role_has_permissions ─────────────────────────────────
        Schema::create($tableNames['role_has_permissions'], static function (Blueprint $table) use ($tableNames, $pivotRole, $pivotPermission) {
            $table->unsignedBigInteger($pivotPermission);
            $table->unsignedBigInteger($pivotRole);

            $table->foreign($pivotPermission)
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->foreign($pivotRole)
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary([$pivotPermission, $pivotRole], 'role_has_permissions_permission_id_role_id_primary');
        });

        app('cache')
            ->store(config('permission.cache.store') != 'default' ? config('permission.cache.store') : null)
            ->forget(config('permission.cache.key'));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tableNames = config('permission.table_names');

        throw_if(empty($tableNames), Exception::class, 'Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');

        Schema::drop($tableNames['role_has_permissions']);
        Schema::drop($tableNames['model_has_roles']);
        Schema::drop($tableNames['model_has_permissions']);
        Schema::drop($tableNames['roles']);
        Schema::drop($tableNames['permissions']);
    }
};
