<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('delivery_challan_charges', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->uuid('delivery_challan_id');
            $table->string('label');
            $table->decimal('amount', 12, 2);
            $table->decimal('tax_rate', 6, 4)->default(0);
            $table->integer('position')->default(1);

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->foreign('delivery_challan_id')->references('id')->on('delivery_challans')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('delivery_challan_charges');
    }
};
