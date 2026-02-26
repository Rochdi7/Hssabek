<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tenant_settings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id')->unique();
            $table->json('account_settings')->nullable();
            $table->json('company_settings')->nullable();
            $table->json('localization_settings')->nullable();
            $table->json('invoice_settings')->nullable();
            $table->json('notification_settings')->nullable();
            $table->json('signature_settings')->nullable();
            $table->json('integration_settings')->nullable();
            $table->json('modules_settings')->nullable();
            $table->dateTime('updated_at');

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tenant_settings');
    }
};
