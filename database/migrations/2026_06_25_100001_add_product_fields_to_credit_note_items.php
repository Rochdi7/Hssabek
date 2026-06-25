<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('credit_note_items', function (Blueprint $table) {
            $table->uuid('product_id')->nullable()->after('credit_note_id');
            $table->uuid('invoice_item_id')->nullable()->after('product_id');

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->nullOnDelete();

            $table->foreign('invoice_item_id')
                ->references('id')->on('invoice_items')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('credit_note_items', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['invoice_item_id']);
            $table->dropColumn(['product_id', 'invoice_item_id']);
        });
    }
};
