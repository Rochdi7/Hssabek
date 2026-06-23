<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Add 'active' as the new default entry state while keeping legacy
        // 'draft'/'sent' legal. Operational states (confirmed/received) are unchanged.
        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE purchase_orders MODIFY status ENUM('draft','sent','active','confirmed','partially_received','received','cancelled') NOT NULL DEFAULT 'active'");
        }

        DB::table('purchase_orders')->whereIn('status', ['draft', 'sent'])->update(['status' => 'active']);
    }

    public function down(): void
    {
        DB::table('purchase_orders')->where('status', 'active')->update(['status' => 'draft']);

        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE purchase_orders MODIFY status ENUM('draft','sent','confirmed','partially_received','received','cancelled') NOT NULL DEFAULT 'draft'");
        }
    }
};
