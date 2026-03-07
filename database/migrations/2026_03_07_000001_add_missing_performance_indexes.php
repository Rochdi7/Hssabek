<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('loan_installments', function (Blueprint $table) {
            $table->index(['loan_id', 'status']);
        });

        Schema::table('email_logs', function (Blueprint $table) {
            $table->index(['tenant_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::table('loan_installments', function (Blueprint $table) {
            $table->dropIndex(['loan_id', 'status']);
        });

        Schema::table('email_logs', function (Blueprint $table) {
            $table->dropIndex(['tenant_id', 'created_at']);
        });
    }
};
