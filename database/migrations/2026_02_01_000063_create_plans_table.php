<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('code')->unique();
            $table->enum('interval', ['month', 'year', 'lifetime'])->default('month');
            $table->decimal('price', 12, 2);
            $table->char('currency', 3)->default('MAD');
            $table->integer('trial_days')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_popular')->default(false);
            $table->json('features')->nullable();
            $table->unsignedInteger('max_users')->nullable();
            $table->unsignedInteger('max_customers')->nullable();
            $table->unsignedInteger('max_products')->nullable();
            $table->unsignedInteger('max_invoices_per_month')->nullable();
            $table->unsignedInteger('max_quotes_per_month')->nullable();
            $table->unsignedInteger('max_exports_per_month')->nullable();
            $table->unsignedInteger('max_warehouses')->nullable();
            $table->unsignedInteger('max_bank_accounts')->nullable();
            $table->unsignedInteger('max_storage_mb')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
