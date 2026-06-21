<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->string('document_type', 32)->default('quote');
            $table->index(['tenant_id', 'document_type'], 'quotes_tenant_document_type_idx');
        });

        DB::table('quotes')
            ->whereNull('document_type')
            ->update(['document_type' => 'quote']);
    }

    public function down(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropIndex('quotes_tenant_document_type_idx');
            $table->dropColumn('document_type');
        });
    }
};
