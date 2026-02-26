<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tenant_templates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->uuid('template_id');
            $table->enum('status', ['active', 'inactive', 'locked'])->default('active');
            $table->dateTime('activated_at')->nullable();
            $table->dateTime('deactivated_at')->nullable();
            $table->dateTime('expires_at')->nullable();
            $table->uuid('activated_by')->nullable();
            $table->enum('source', ['manual', 'plan', 'purchase', 'promo', 'gift', 'bulk_assign'])->default('manual');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();
            $table->foreign('template_id')->references('id')->on('template_catalog')->cascadeOnDelete();
            $table->foreign('activated_by')->references('id')->on('users')->nullOnDelete();
            $table->unique(['tenant_id', 'template_id']);
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tenant_templates');
    }
};
