<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Create the users table with UUID primary key for the multi-tenant system.
     * Idempotent: skips if users table already exists.
     */
    public function up(): void
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->uuid('tenant_id')->nullable();
                $table->string('name');
                $table->string('email')->unique();
                $table->dateTime('email_verified_at')->nullable();
                $table->string('password');
                $table->string('avatar_url')->nullable();
                $table->enum('status', ['active', 'blocked'])->default('active');
                $table->dateTime('last_login_at')->nullable();
                $table->string('last_login_ip')->nullable();
                $table->rememberToken();
                $table->timestamps();

                $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
                $table->index('tenant_id');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
