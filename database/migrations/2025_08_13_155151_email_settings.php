<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('email_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('type')->default('string'); // string, boolean, integer
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Insert default email settings
        DB::table('email_settings')->insert([
            [
                'key' => 'MAIL_MAILER',
                'value' => 'smtp',
                'type' => 'string',
                'description' => 'Mail driver (smtp, sendmail, mailgun, etc.)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'MAIL_HOST',
                'value' => 'smtp.gmail.com',
                'type' => 'string',
                'description' => 'SMTP Host',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'MAIL_PORT',
                'value' => '587',
                'type' => 'integer',
                'description' => 'SMTP Port',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'MAIL_USERNAME',
                'value' => 'andri.nnkn@gmail.com',
                'type' => 'string',
                'description' => 'SMTP Username',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'MAIL_PASSWORD',
                'value' => 'andri.nnkn@gmail.com',
                'type' => 'password',
                'description' => 'SMTP Password',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'MAIL_ENCRYPTION',
                'value' => 'tls',
                'type' => 'string',
                'description' => 'Mail Encryption (tls, ssl, null)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'MAIL_FROM_ADDRESS',
                'value' => 'andri.nnkn@gmail.com',
                'type' => 'string',
                'description' => 'Default From Email Address',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'MAIL_FROM_NAME',
                'value' => config('app.name'),
                'type' => 'string',
                'description' => 'Default From Name',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_settings');
    }
};