<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->enum('item_type', ['product', 'service']);
            $table->string('name');
            $table->string('code');
            $table->string('sku')->nullable();
            $table->string('slug')->nullable();
            $table->uuid('category_id')->nullable();
            $table->uuid('unit_id')->nullable();
            $table->text('description')->nullable();

            // Prices
            $table->decimal('selling_price', 12, 2);
            $table->decimal('purchase_price', 12, 2)->default(0);
            $table->char('currency', 3)->nullable();

            // Inventory
            $table->boolean('track_inventory')->default(false);
            $table->decimal('quantity', 14, 3)->default(0);
            $table->decimal('alert_quantity', 14, 3)->nullable();
            $table->string('barcode')->nullable();

            // Discount / Tax
            $table->enum('discount_type', ['none', 'percentage', 'fixed'])->nullable();
            $table->decimal('discount_value', 12, 4)->default(0);
            $table->uuid('tax_category_id')->nullable();

            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('product_categories')->nullOnDelete();
            $table->foreign('unit_id')->references('id')->on('units')->nullOnDelete();
            $table->foreign('tax_category_id')->references('id')->on('tax_categories')->nullOnDelete();
            $table->index('tenant_id');
            $table->index(['tenant_id', 'is_active']);
            $table->index(['tenant_id', 'code']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
