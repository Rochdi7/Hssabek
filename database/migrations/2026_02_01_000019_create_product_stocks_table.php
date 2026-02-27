<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->uuid('warehouse_id');
            $table->uuid('product_id');
            $table->decimal('quantity_on_hand', 14, 3)->default(0);
            $table->decimal('quantity_reserved', 14, 3)->default(0);
            $table->decimal('reorder_point', 14, 3)->nullable();
            $table->decimal('reorder_quantity', 14, 3)->nullable();
            $table->dateTime('updated_at');

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->index('tenant_id');
            $table->index('warehouse_id');
            $table->index('product_id');
            $table->unique(['tenant_id', 'warehouse_id', 'product_id'], 'idx_stock_tenant_wh_prod');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_stocks');
    }
};
