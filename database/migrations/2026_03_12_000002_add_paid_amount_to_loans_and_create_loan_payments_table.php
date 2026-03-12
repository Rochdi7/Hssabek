<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->decimal('paid_amount', 12, 2)->default(0)->after('total_amount');
        });

        Schema::create('loan_payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->uuid('loan_id');
            $table->decimal('amount', 12, 2);
            $table->date('payment_date');
            $table->enum('payment_mode', ['cash', 'bank_transfer', 'card', 'cheque', 'other']);
            $table->uuid('bank_account_id')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->foreign('loan_id')->references('id')->on('loans')->cascadeOnDelete();
            $table->foreign('bank_account_id')->references('id')->on('bank_accounts')->nullOnDelete();
            $table->index('tenant_id');
            $table->index('loan_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loan_payments');

        Schema::table('loans', function (Blueprint $table) {
            $table->dropColumn('paid_amount');
        });
    }
};
