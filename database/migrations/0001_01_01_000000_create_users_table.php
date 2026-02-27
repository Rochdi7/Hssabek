<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Default Laravel users migration (idempotent).
 *
 * Our project uses 2026_02_01_000003_create_users_table.php for the actual
 * users table (UUID primary key, tenant_id, etc.).
 *
 * This file exists solely so `php artisan migrate` completes without errors.
 * All Schema::create calls are wrapped in hasTable() guards to never
 * overwrite or conflict with existing tables.
 */
return new class() extends Migration {
    /**
     * Users table is created by 2026_02_01_000003 (UUID primary key).
     * This migration only handles password_reset_tokens and sessions.
     * Sessions uses string user_id (not foreignId) to match UUID users.
     */
    public function up(): void
    {
        if (!Schema::hasTable('password_reset_tokens')) {
            Schema::create('password_reset_tokens', function (Blueprint $table) {
                $table->string('email')->primary();
                $table->string('token');
                $table->timestamp('created_at')->nullable();
            });
        }

        if (!Schema::hasTable('sessions')) {
            Schema::create('sessions', function (Blueprint $table) {
                $table->string('id')->primary();
                $table->uuid('user_id')->nullable()->index();
                $table->string('ip_address', 45)->nullable();
                $table->text('user_agent')->nullable();
                $table->longText('payload');
                $table->integer('last_activity')->index();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
