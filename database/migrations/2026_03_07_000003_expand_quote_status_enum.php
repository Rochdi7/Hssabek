<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Add 'active' as the new default entry state while keeping 'draft'/'sent'
        // legal. Quotes never affect CA and never receive payments.
        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE quotes MODIFY status ENUM('draft','sent','active','accepted','rejected','expired','cancelled') NOT NULL DEFAULT 'active'");
        }

        DB::table('quotes')->whereIn('status', ['draft', 'sent'])->update(['status' => 'active']);
    }

    public function down(): void
    {
        DB::table('quotes')->where('status', 'active')->update(['status' => 'draft']);

        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE quotes MODIFY status ENUM('draft','sent','accepted','rejected','expired','cancelled') NOT NULL DEFAULT 'draft'");
        }
    }
};
