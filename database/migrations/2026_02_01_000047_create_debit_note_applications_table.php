<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('debit_note_applications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->uuid('debit_note_id');
            $table->uuid('vendor_bill_id');
            $table->decimal('amount_applied', 12, 2);
            $table->dateTime('applied_at');

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->foreign('debit_note_id')->references('id')->on('debit_notes')->cascadeOnDelete();
            $table->foreign('vendor_bill_id')->references('id')->on('vendor_bills')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('debit_note_applications');
    }
};
