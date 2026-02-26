<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('email_logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->string('to');
            $table->string('subject');
            $table->enum('type', [
                'quote',
                'invoice',
                'reminder',
                'delivery_challan',
                'debit_note',
                'vendor_bill',
                'payment_receipt'
            ]);
            $table->uuid('entity_id');
            $table->enum('status', ['queued', 'sent', 'failed'])->default('queued');
            $table->text('error')->nullable();
            $table->dateTime('sent_at')->nullable();
            $table->dateTime('created_at');

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->index('tenant_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('email_logs');
    }
};
