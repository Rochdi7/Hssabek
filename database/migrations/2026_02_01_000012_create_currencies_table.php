<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->char('code', 3)->primary();
            $table->string('name');
            $table->string('symbol')->nullable();
            $table->tinyInteger('precision')->default(2);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
