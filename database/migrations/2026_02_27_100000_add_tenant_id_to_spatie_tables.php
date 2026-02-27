<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add tenant_id to roles table
        if (Schema::hasTable('roles') && !Schema::hasColumn('roles', 'tenant_id')) {
            Schema::table('roles', function (Blueprint $table) {
                $table->uuid('tenant_id')->nullable()->after('id');
                $table->index('tenant_id');
                // Update unique constraint
                $table->dropUnique(['name', 'guard_name']);
                $table->unique(['tenant_id', 'name', 'guard_name']);
            });
        }

        // Add tenant_id to permissions table
        if (Schema::hasTable('permissions') && !Schema::hasColumn('permissions', 'tenant_id')) {
            Schema::table('permissions', function (Blueprint $table) {
                $table->uuid('tenant_id')->nullable()->after('id');
                $table->index('tenant_id');
                // Update unique constraint
                $table->dropUnique(['name', 'guard_name']);
                $table->unique(['tenant_id', 'name', 'guard_name']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove tenant_id from permissions table
        if (Schema::hasTable('permissions') && Schema::hasColumn('permissions', 'tenant_id')) {
            Schema::table('permissions', function (Blueprint $table) {
                $table->dropUnique(['tenant_id', 'name', 'guard_name']);
                $table->unique(['name', 'guard_name']);
                $table->dropColumn('tenant_id');
            });
        }

        // Remove tenant_id from roles table
        if (Schema::hasTable('roles') && Schema::hasColumn('roles', 'tenant_id')) {
            Schema::table('roles', function (Blueprint $table) {
                $table->dropUnique(['tenant_id', 'name', 'guard_name']);
                $table->unique(['name', 'guard_name']);
                $table->dropColumn('tenant_id');
            });
        }
    }
};
