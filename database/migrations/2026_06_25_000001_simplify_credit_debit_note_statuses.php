<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Collapse the draft/issued workflow for credit notes and debit notes.
 * Order: extend enum to include 'active' → backfill → narrow enum to final set.
 */
return new class extends Migration {
    public function up(): void
    {
        // ── Credit Notes ──────────────────────────────────────────────
        // Step 1: Temporarily widen the enum so 'active' is a valid value
        Schema::table('credit_notes', function (Blueprint $table) {
            $table->enum('status', ['draft', 'issued', 'active', 'applied', 'void'])
                  ->default('active')
                  ->change();
        });
        // Step 2: Backfill old values
        DB::table('credit_notes')
            ->whereIn('status', ['draft', 'issued'])
            ->update(['status' => 'active']);
        // Step 3: Narrow enum to final set
        Schema::table('credit_notes', function (Blueprint $table) {
            $table->enum('status', ['active', 'applied', 'void'])
                  ->default('active')
                  ->change();
        });

        // ── Debit Notes ───────────────────────────────────────────────
        Schema::table('debit_notes', function (Blueprint $table) {
            $table->enum('status', ['draft', 'issued', 'active', 'applied', 'void'])
                  ->default('active')
                  ->change();
        });
        DB::table('debit_notes')
            ->whereIn('status', ['draft', 'issued'])
            ->update(['status' => 'active']);
        Schema::table('debit_notes', function (Blueprint $table) {
            $table->enum('status', ['active', 'applied', 'void'])
                  ->default('active')
                  ->change();
        });
    }

    public function down(): void
    {
        Schema::table('credit_notes', function (Blueprint $table) {
            $table->enum('status', ['draft', 'issued', 'active', 'applied', 'void'])
                  ->default('draft')
                  ->change();
        });
        DB::table('credit_notes')
            ->where('status', 'active')
            ->update(['status' => 'issued']);
        Schema::table('credit_notes', function (Blueprint $table) {
            $table->enum('status', ['draft', 'issued', 'applied', 'void'])
                  ->default('draft')
                  ->change();
        });

        Schema::table('debit_notes', function (Blueprint $table) {
            $table->enum('status', ['draft', 'issued', 'active', 'applied', 'void'])
                  ->default('draft')
                  ->change();
        });
        DB::table('debit_notes')
            ->where('status', 'active')
            ->update(['status' => 'issued']);
        Schema::table('debit_notes', function (Blueprint $table) {
            $table->enum('status', ['draft', 'issued', 'applied', 'void'])
                  ->default('draft')
                  ->change();
        });
    }
};
