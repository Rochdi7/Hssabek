<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('template_catalog', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('document_type', [
                'invoice',
                'quote',
                'delivery_challan',
                'credit_note',
                'debit_note',
                'purchase_order',
                'vendor_bill',
                'receipt'
            ]);
            $table->string('category')->nullable();
            $table->text('description')->nullable();
            $table->json('features')->nullable();
            $table->enum('engine', ['blade', 'html', 'mjml'])->default('blade');
            $table->string('view_path');
            $table->string('css_path')->nullable();
            $table->string('version')->default('1.0.0');
            $table->decimal('price', 12, 2)->default(0);
            $table->char('currency', 3)->default('MAD');
            $table->boolean('is_free')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->uuid('created_by')->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->index(['document_type', 'is_active']);
            $table->index(['is_free', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('template_catalog');
    }
};
