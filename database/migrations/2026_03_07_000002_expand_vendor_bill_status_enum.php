<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // MySQL: widen the ENUM to add 'unpaid', 'partial', 'overdue' while KEEPING
        // 'draft'/'posted' as legal values (zero data loss, reversible).
        // This also fixes the long-standing bug where the service wrote 'partial'
        // (a value the ENUM previously rejected).
        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE vendor_bills MODIFY status ENUM('draft','posted','unpaid','partial','paid','overdue','void') NOT NULL DEFAULT 'unpaid'");
        }

        // Remap legacy active states to the simplified 'unpaid' state.
        DB::table('vendor_bills')->whereIn('status', ['draft', 'posted'])->update(['status' => 'unpaid']);
    }

    public function down(): void
    {
        DB::table('vendor_bills')->whereIn('status', ['unpaid', 'partial', 'overdue'])->update(['status' => 'draft']);

        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE vendor_bills MODIFY status ENUM('draft','posted','paid','void') NOT NULL DEFAULT 'draft'");
        }
    }
};
