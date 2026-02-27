<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Fix media table model_id to support UUID morphs.
     * Required because User model uses HasUuids (UUID primary keys).
     */
    public function up(): void
    {
        Schema::table('media', function (Blueprint $table) {
            // Drop the old bigint-based morph index and columns
            $table->dropMorphs('model');
        });

        Schema::table('media', function (Blueprint $table) {
            // Re-create as UUID morphs (model_id as char(36))
            $table->uuidMorphs('model');
        });
    }

    public function down(): void
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropMorphs('model');
        });

        Schema::table('media', function (Blueprint $table) {
            $table->morphs('model');
        });
    }
};
