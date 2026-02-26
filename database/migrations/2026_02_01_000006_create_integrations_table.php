<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('integrations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->enum('provider', ['gmail', 'google_calendar', 'stripe', 'whatsapp', 'other']);
            $table->enum('status', ['connected', 'disconnected', 'error'])->default('disconnected');
            $table->json('credentials')->nullable();
            $table->json('settings')->nullable();
            $table->dateTime('last_synced_at')->nullable();
            $table->timestamps();

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->index('tenant_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('integrations');
    }
};
