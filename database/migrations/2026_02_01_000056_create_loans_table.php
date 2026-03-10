<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->enum('lender_type', ['bank', 'personal', 'other']);
            $table->string('lender_name');
            $table->string('reference_number')->nullable();
            $table->decimal('principal_amount', 14, 2);
            $table->decimal('interest_rate', 6, 3)->nullable();
            $table->enum('interest_type', ['fixed', 'reducing'])->default('fixed');
            $table->decimal('total_amount', 14, 2);
            $table->decimal('remaining_balance', 14, 2);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->enum('payment_frequency', ['monthly', 'quarterly', 'yearly']);
            $table->enum('status', ['active', 'closed', 'defaulted'])->default('active');
            $table->text('notes')->nullable();
            $table->uuid('created_by')->nullable();
            $table->timestamps();

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->index('tenant_id');
            $table->index(['tenant_id', 'status']);
            $table->index(['tenant_id', 'lender_name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
