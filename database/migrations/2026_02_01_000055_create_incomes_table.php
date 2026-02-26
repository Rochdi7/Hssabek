<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->string('income_number');
            $table->string('reference_number')->nullable();
            $table->decimal('amount', 12, 2);
            $table->char('currency', 3);
            $table->date('income_date');
            $table->enum('payment_mode', ['cash', 'bank_transfer', 'card', 'cheque', 'other']);
            $table->uuid('bank_account_id')->nullable();
            $table->uuid('customer_id')->nullable();
            $table->uuid('category_id')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->foreign('bank_account_id')->references('id')->on('bank_accounts')->nullOnDelete();
            $table->foreign('customer_id')->references('id')->on('customers')->nullOnDelete();
            $table->foreign('category_id')->references('id')->on('finance_categories')->nullOnDelete();
            $table->index('tenant_id');
            $table->unique(['tenant_id', 'income_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
