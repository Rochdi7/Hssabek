<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->string('title_fr')->nullable()->after('title');
            $table->string('title_ar')->nullable()->after('title_fr');
            $table->string('title_en')->nullable()->after('title_ar');
            $table->text('content_fr')->nullable()->after('content');
            $table->text('content_ar')->nullable()->after('content_fr');
            $table->text('content_en')->nullable()->after('content_ar');
            $table->string('attachment')->nullable()->after('expires_at');
        });

        // Copy existing title/content into fr columns
        DB::statement('UPDATE announcements SET title_fr = title, content_fr = content WHERE title_fr IS NULL');
    }

    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->dropColumn(['title_fr', 'title_ar', 'title_en', 'content_fr', 'content_ar', 'content_en', 'attachment']);
        });
    }
};
