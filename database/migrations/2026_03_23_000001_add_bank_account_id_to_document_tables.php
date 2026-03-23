<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $tables = [
        'invoices',
        'quotes',
        'credit_notes',
        'delivery_challans',
        'purchase_orders',
        'vendor_bills',
        'debit_notes',
    ];

    public function up(): void
    {
        foreach ($this->tables as $table) {
            Schema::table($table, function (Blueprint $blueprint) {
                $blueprint->uuid('bank_account_id')->nullable()->after('tenant_id');
                $blueprint->foreign('bank_account_id')->references('id')->on('bank_accounts')->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        foreach ($this->tables as $table) {
            Schema::table($table, function (Blueprint $blueprint) use ($table) {
                $blueprint->dropForeign([$table . '_bank_account_id_foreign']);
                $blueprint->dropColumn('bank_account_id');
            });
        }
    }
};
