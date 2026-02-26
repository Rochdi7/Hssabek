<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('invoice_reminders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->uuid('invoice_id');
            $table->enum('type', ['before_due', 'on_due', 'after_due']);
            $table->dateTime('scheduled_at');
            $table->enum('channel', ['email', 'sms', 'whatsapp', 'in_app']);
            $table->enum('status', ['queued', 'sent', 'failed'])->default('queued');
            $table->dateTime('sent_at')->nullable();
            $table->text('error')->nullable();
            $table->dateTime('created_at');

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->foreign('invoice_id')->references('id')->on('invoices')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice_reminders');
    }
};
