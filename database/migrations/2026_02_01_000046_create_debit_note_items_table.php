<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('debit_note_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->uuid('debit_note_id');
            $table->uuid('product_id')->nullable();
            $table->string('label');
            $table->text('description')->nullable();
            $table->decimal('quantity', 14, 3);
            $table->uuid('unit_id')->nullable();
            $table->decimal('unit_cost', 12, 2);
            $table->enum('discount_type', ['none', 'percentage', 'fixed'])->default('none');
            $table->decimal('discount_value', 12, 4)->default(0);
            $table->decimal('tax_rate', 6, 4);
            $table->uuid('tax_group_id')->nullable();
            $table->decimal('line_total', 12, 2);
            $table->integer('position');

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->foreign('debit_note_id')->references('id')->on('debit_notes')->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->nullOnDelete();
            $table->foreign('unit_id')->references('id')->on('units')->nullOnDelete();
            $table->foreign('tax_group_id')->references('id')->on('tax_groups')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('debit_note_items');
    }
};
