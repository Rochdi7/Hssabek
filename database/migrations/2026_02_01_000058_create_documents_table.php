<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->enum('type', [
                'quote_pdf',
                'invoice_pdf',
                'credit_note_pdf',
                'delivery_challan_pdf',
                'debit_note_pdf',
                'purchase_order_pdf',
                'vendor_bill_pdf'
            ]);
            $table->uuid('entity_id');
            $table->string('path');
            $table->string('hash')->nullable();
            $table->dateTime('generated_at');
            $table->timestamps();

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->index('tenant_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
