<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->uuid('warehouse_id');
            $table->uuid('product_id');
            $table->enum('movement_type', [
                'stock_in',
                'stock_out',
                'adjustment_in',
                'adjustment_out',
                'transfer_in',
                'transfer_out',
                'return_in',
                'return_out',
                'reserve',
                'unreserve',
                'purchase_in',
                'sale_out'
            ]);
            $table->decimal('quantity', 14, 3);
            $table->decimal('unit_cost', 12, 2)->nullable();
            $table->string('reference_type')->nullable();
            $table->uuid('reference_id')->nullable();
            $table->text('note')->nullable();
            $table->dateTime('moved_at');
            $table->uuid('created_by')->nullable();
            $table->dateTime('created_at');

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->index('tenant_id');
            $table->index('warehouse_id');
            $table->index('product_id');
            $table->index(['tenant_id', 'product_id', 'moved_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
