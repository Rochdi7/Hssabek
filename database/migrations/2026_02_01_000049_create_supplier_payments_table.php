<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('supplier_payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->uuid('supplier_id');
            $table->uuid('vendor_bill_id')->nullable();
            $table->char('currency', 3);
            $table->decimal('amount', 12, 2);
            $table->enum('status', ['pending', 'succeeded', 'failed', 'refunded', 'cancelled'])->default('pending');
            $table->date('payment_date')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->string('reference_number')->nullable();
            $table->uuid('payment_method_id')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('vendor_bill_id')->references('id')->on('vendor_bills')->nullOnDelete();
            $table->foreign('payment_method_id')->references('id')->on('supplier_payment_methods')->nullOnDelete();
            $table->index('tenant_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('supplier_payments');
    }
};
