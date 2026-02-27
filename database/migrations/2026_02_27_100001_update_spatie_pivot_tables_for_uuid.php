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
        // Drop existing model_has_roles and model_has_permissions tables
        if (Schema::hasTable('model_has_roles')) {
            Schema::drop('model_has_roles');
        }

        if (Schema::hasTable('model_has_permissions')) {
            Schema::drop('model_has_permissions');
        }

        // Recreate model_has_roles with UUID support
        Schema::create('model_has_roles', function (Blueprint $table) {
            $table->uuid('model_id');
            $table->string('model_type');
            $table->unsignedBigInteger('role_id');

            $table->index(['model_id', 'model_type'], 'model_has_roles_model_id_model_type_index');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->primary(['model_id', 'model_type', 'role_id'], 'model_has_roles_primary');
        });

        // Recreate model_has_permissions with UUID support
        Schema::create('model_has_permissions', function (Blueprint $table) {
            $table->uuid('model_id');
            $table->string('model_type');
            $table->unsignedBigInteger('permission_id');

            $table->index(['model_id', 'model_type'], 'model_has_permissions_model_id_model_type_index');

            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');

            $table->primary(['model_id', 'model_type', 'permission_id'], 'model_has_permissions_primary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_has_permissions');
        Schema::dropIfExists('model_has_roles');
    }
};
