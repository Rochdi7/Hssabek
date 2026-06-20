<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->uuid('public_token')->nullable()->unique()->after('accepted_at');
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->uuid('public_token')->nullable()->unique()->after('paid_at');
        });

        // Backfill existing rows
        \DB::table('quotes')->whereNull('public_token')->lazyById()->each(function ($row) {
            \DB::table('quotes')->where('id', $row->id)->update(['public_token' => Str::uuid()]);
        });

        \DB::table('invoices')->whereNull('public_token')->lazyById()->each(function ($row) {
            \DB::table('invoices')->where('id', $row->id)->update(['public_token' => Str::uuid()]);
        });
    }

    public function down(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn('public_token');
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('public_token');
        });
    }
};
