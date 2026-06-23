<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // MySQL: widen the ENUM to include 'unpaid' while KEEPING 'draft'/'sent'
        // so no existing value becomes illegal (zero data loss, reversible).
        // SQLite (tests) stores enums as free-text — no schema change needed.
        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE invoices MODIFY status ENUM('draft','sent','unpaid','partial','paid','overdue','void') NOT NULL DEFAULT 'unpaid'");
        }

        // Remap legacy active states to the simplified 'unpaid' state.
        DB::table('invoices')->whereIn('status', ['draft', 'sent'])->update(['status' => 'unpaid']);
    }

    public function down(): void
    {
        // Reverse the data remap as best as possible: legacy rows are no longer
        // distinguishable, so map 'unpaid' back to 'draft' (the old default).
        DB::table('invoices')->where('status', 'unpaid')->update(['status' => 'draft']);

        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE invoices MODIFY status ENUM('draft','sent','partial','paid','overdue','void') NOT NULL DEFAULT 'draft'");
        }
    }
};
