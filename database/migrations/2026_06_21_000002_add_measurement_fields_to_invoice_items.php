<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->string('calculation_mode')->default('quantity')->after('position');
            $table->decimal('length', 10, 3)->nullable()->after('calculation_mode');
            $table->decimal('width', 10, 3)->nullable()->after('length');
            $table->decimal('height', 10, 3)->nullable()->after('width');
            $table->decimal('thickness', 10, 3)->nullable()->after('height');
            $table->string('measurement_unit', 20)->nullable()->after('thickness');
            $table->decimal('calculated_measurement', 12, 4)->nullable()->after('measurement_unit');
        });
    }

    public function down(): void
    {
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->dropColumn([
                'calculation_mode', 'length', 'width', 'height',
                'thickness', 'measurement_unit', 'calculated_measurement',
            ]);
        });
    }
};
