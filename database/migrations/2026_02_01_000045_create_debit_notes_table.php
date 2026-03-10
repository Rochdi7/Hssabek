<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('debit_notes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->uuid('supplier_id');
            $table->uuid('purchase_order_id')->nullable();
            $table->uuid('vendor_bill_id')->nullable();
            $table->string('number');
            $table->string('reference_number')->nullable();
            $table->enum('status', ['draft', 'issued', 'applied', 'void'])->default('draft');
            $table->date('debit_note_date');
            $table->date('due_date')->nullable();
            $table->boolean('enable_tax')->default(true);
            $table->json('bill_from_snapshot')->nullable();
            $table->json('bill_to_snapshot')->nullable();
            $table->decimal('subtotal', 12, 2);
            $table->decimal('discount_total', 12, 2)->default(0);
            $table->decimal('tax_total', 12, 2)->default(0);
            $table->decimal('round_off', 12, 2)->default(0);
            $table->decimal('total', 12, 2);
            $table->string('total_in_words')->nullable();
            $table->text('notes')->nullable();
            $table->text('terms')->nullable();
            $table->json('bank_details_snapshot')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders')->nullOnDelete();
            $table->foreign('vendor_bill_id')->references('id')->on('vendor_bills')->nullOnDelete();
            $table->index('tenant_id');
            $table->unique(['tenant_id', 'number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('debit_notes');
    }
};
