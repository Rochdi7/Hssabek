<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('user_invitations', function (Blueprint $table) {
            // Tracks whether the credentials/invitation e-mail was sent successfully.
            $table->string('mail_status')->default('pending')->after('created_by'); // pending | sent | failed
            $table->dateTime('mail_sent_at')->nullable()->after('mail_status');
            $table->text('mail_error')->nullable()->after('mail_sent_at');
            // Encrypted copy of the auto-generated password so the e-mail can be re-sent.
            $table->text('generated_password')->nullable()->after('mail_error');
        });
    }

    public function down(): void
    {
        Schema::table('user_invitations', function (Blueprint $table) {
            $table->dropColumn(['mail_status', 'mail_sent_at', 'mail_error', 'generated_password']);
        });
    }
};
