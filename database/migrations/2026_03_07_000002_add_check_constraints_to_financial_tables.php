<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (!in_array(DB::getDriverName(), ['mysql', 'pgsql'])) {
            return;
        }

        DB::statement('ALTER TABLE invoices ADD CONSTRAINT chk_invoices_total CHECK (total >= 0)');
        DB::statement('ALTER TABLE invoices ADD CONSTRAINT chk_invoices_amount_due CHECK (amount_due >= 0)');
        DB::statement('ALTER TABLE invoices ADD CONSTRAINT chk_invoices_amount_paid CHECK (amount_paid >= 0)');
        DB::statement('ALTER TABLE payments ADD CONSTRAINT chk_payments_amount CHECK (amount >= 0)');
        DB::statement('ALTER TABLE vendor_bills ADD CONSTRAINT chk_vendor_bills_total CHECK (total >= 0)');
        DB::statement('ALTER TABLE vendor_bills ADD CONSTRAINT chk_vendor_bills_amount_due CHECK (amount_due >= 0)');
        DB::statement('ALTER TABLE credit_notes ADD CONSTRAINT chk_credit_notes_total CHECK (total >= 0)');
        DB::statement('ALTER TABLE expenses ADD CONSTRAINT chk_expenses_amount CHECK (amount >= 0)');
    }

    public function down(): void
    {
        if (!in_array(DB::getDriverName(), ['mysql', 'pgsql'])) {
            return;
        }

        if (DB::getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE invoices DROP CHECK chk_invoices_total');
            DB::statement('ALTER TABLE invoices DROP CHECK chk_invoices_amount_due');
            DB::statement('ALTER TABLE invoices DROP CHECK chk_invoices_amount_paid');
            DB::statement('ALTER TABLE payments DROP CHECK chk_payments_amount');
            DB::statement('ALTER TABLE vendor_bills DROP CHECK chk_vendor_bills_total');
            DB::statement('ALTER TABLE vendor_bills DROP CHECK chk_vendor_bills_amount_due');
            DB::statement('ALTER TABLE credit_notes DROP CHECK chk_credit_notes_total');
            DB::statement('ALTER TABLE expenses DROP CHECK chk_expenses_amount');
        } else {
            DB::statement('ALTER TABLE invoices DROP CONSTRAINT chk_invoices_total');
            DB::statement('ALTER TABLE invoices DROP CONSTRAINT chk_invoices_amount_due');
            DB::statement('ALTER TABLE invoices DROP CONSTRAINT chk_invoices_amount_paid');
            DB::statement('ALTER TABLE payments DROP CONSTRAINT chk_payments_amount');
            DB::statement('ALTER TABLE vendor_bills DROP CONSTRAINT chk_vendor_bills_total');
            DB::statement('ALTER TABLE vendor_bills DROP CONSTRAINT chk_vendor_bills_amount_due');
            DB::statement('ALTER TABLE credit_notes DROP CONSTRAINT chk_credit_notes_total');
            DB::statement('ALTER TABLE expenses DROP CONSTRAINT chk_expenses_amount');
        }
    }
};
