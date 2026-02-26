<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('money_transfers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->uuid('from_bank_account_id');
            $table->uuid('to_bank_account_id');
            $table->string('reference_number')->nullable();
            $table->date('transfer_date');
            $table->decimal('amount', 12, 2);
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->foreign('from_bank_account_id')->references('id')->on('bank_accounts');
            $table->foreign('to_bank_account_id')->references('id')->on('bank_accounts');
            $table->index('tenant_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('money_transfers');
    }
};
