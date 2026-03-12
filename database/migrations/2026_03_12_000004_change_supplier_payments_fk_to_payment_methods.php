<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('supplier_payments', function (Blueprint $table) {
            $table->dropForeign(['payment_method_id']);
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->nullOnDelete();
        });

        Schema::dropIfExists('supplier_payment_methods');
    }

    public function down(): void
    {
        Schema::create('supplier_payment_methods', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->string('name');
            $table->enum('provider', ['manual', 'stripe', 'paypal', 'other'])->default('manual');
            $table->boolean('is_active')->default(true);

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->index('tenant_id');
        });

        Schema::table('supplier_payments', function (Blueprint $table) {
            $table->dropForeign(['payment_method_id']);
            $table->foreign('payment_method_id')->references('id')->on('supplier_payment_methods')->nullOnDelete();
        });
    }
};
