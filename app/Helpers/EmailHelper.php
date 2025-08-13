<?php

// Helper function untuk mudah akses setting (Optional)
// Buat file app/Helpers/EmailHelper.php

namespace App\Helpers;

use App\Models\EmailSetting;

class EmailHelper
{
    /**
     * Get email setting value
     */
    public static function getSetting($key, $default = null)
    {
        return EmailSetting::get($key, $default);
    }

    /**
     * Set email setting value
     */
    public static function setSetting($key, $value, $type = 'string', $description = null)
    {
        return EmailSetting::set($key, $value, $type, $description);
    }

    /**
     * Get all email settings
     */
    public static function getAllSettings()
    {
        return EmailSetting::getAllSettings();
    }

    /**
     * Test email configuration
     */
    public static function testEmailConfig($toEmail = null)
    {
        try {
            EmailSetting::refreshMailConfig();
            
            $fromAddress = self::getSetting('MAIL_FROM_ADDRESS');
            $fromName = self::getSetting('MAIL_FROM_NAME', config('app.name'));
            $testEmail = $toEmail ?? $fromAddress;
            
            \Mail::raw('Test email from ' . config('app.name'), function ($message) use ($fromAddress, $fromName, $testEmail) {
                $message->from($fromAddress, $fromName)
                        ->to($testEmail)
                        ->subject('Test Email Configuration');
            });
            
            return ['success' => true, 'message' => 'Test email sent successfully'];
            
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}

// Usage Examples:

// 1. Menggunakan di Controller
class TestController extends Controller
{
    public function sendTestEmail()
    {
        $result = \App\Helpers\EmailHelper::testEmailConfig();
        
        if ($result['success']) {
            return response()->json(['message' => 'Email berhasil dikirim']);
        }
        
        return response()->json(['error' => $result['message']], 500);
    }
}

// 2. Menggunakan di Mailable
class WelcomeEmail extends Mailable
{
    public function build()
    {
        $fromAddress = \App\Models\EmailSetting::get('MAIL_FROM_ADDRESS');
        $fromName = \App\Models\EmailSetting::get('MAIL_FROM_NAME');
        
        return $this->from($fromAddress, $fromName)
                    ->subject('Welcome to ' . config('app.name'))
                    ->view('emails.welcome');
    }
}

// 3. Menggunakan di Command untuk setup awal
class SetupEmailCommand extends Command
{
    protected $signature = 'email:setup';
    
    public function handle()
    {
        $settings = [
            'MAIL_MAILER' => $this->ask('Mail Driver (smtp)', 'smtp'),
            'MAIL_HOST' => $this->ask('SMTP Host', 'smtp.gmail.com'),
            'MAIL_PORT' => $this->ask('SMTP Port', '587'),
            'MAIL_USERNAME' => $this->ask('SMTP Username'),
            'MAIL_PASSWORD' => $this->secret('SMTP Password'),
            'MAIL_ENCRYPTION' => $this->choice('Encryption', ['tls', 'ssl', 'none'], 'tls'),
            'MAIL_FROM_ADDRESS' => $this->ask('From Address'),
            'MAIL_FROM_NAME' => $this->ask('From Name', config('app.name')),
        ];
        
        foreach ($settings as $key => $value) {
            \App\Models\EmailSetting::set($key, $value);
        }
        
        $this->info('Email settings saved successfully!');
    }
}