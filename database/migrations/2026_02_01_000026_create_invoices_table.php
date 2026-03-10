<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->uuid('customer_id');
            $table->uuid('quote_id')->nullable();
            $table->string('number');
            $table->string('reference_number')->nullable();
            $table->enum('status', ['draft', 'sent', 'partial', 'paid', 'overdue', 'void'])->default('draft');
            $table->date('issue_date');
            $table->date('due_date')->nullable();
            $table->boolean('enable_tax')->default(true);
            $table->json('bill_from_snapshot')->nullable();
            $table->json('bill_to_snapshot')->nullable();
            $table->decimal('subtotal', 12, 2);
            $table->decimal('discount_total', 12, 2)->default(0);
            $table->decimal('tax_total', 12, 2)->default(0);
            $table->decimal('round_off', 12, 2)->default(0);
            $table->decimal('total', 12, 2);
            $table->decimal('amount_paid', 12, 2)->default(0);
            $table->decimal('amount_due', 12, 2);
            $table->string('total_in_words')->nullable();
            $table->text('notes')->nullable();
            $table->text('terms')->nullable();
            $table->json('bank_details_snapshot')->nullable();
            $table->dateTime('sent_at')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->foreign('quote_id')->references('id')->on('quotes')->nullOnDelete();
            $table->index('tenant_id');
            $table->index('customer_id');
            $table->unique(['tenant_id', 'number']);
            $table->index(['tenant_id', 'status', 'due_date']);
            $table->index(['tenant_id', 'customer_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
