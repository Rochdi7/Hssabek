<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('default_calc_mode', 20)->default('quantity')->after('is_active');
            $table->string('default_measurement_unit', 20)->nullable()->after('default_calc_mode');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['default_calc_mode', 'default_measurement_unit']);
        });
    }
};
