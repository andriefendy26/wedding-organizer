<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class EmailSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'description',
    ];

    protected $casts = [
        'value' => 'string',
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::saved(function () {
            self::refreshMailConfig();
        });

        static::deleted(function () {
            self::refreshMailConfig();
        });
    }

    /**
     * Get setting value by key
     */
    public static function get($key, $default = null)
    {
        $setting = Cache::remember("email_setting_{$key}", 3600, function () use ($key) {
            return self::where('key', $key)->first();
        });

        if (!$setting) {
            return $default;
        }

        return self::castValue($setting->value, $setting->type);
    }

    /**
     * Set setting value by key
     */
    public static function set($key, $value, $type = 'string', $description = null)
    {
        self::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'type' => $type,
                'description' => $description,
            ]
        );

        Cache::forget("email_setting_{$key}");
    }

    /**
     * Cast value based on type
     */
    private static function castValue($value, $type)
    {
        switch ($type) {
            case 'boolean':
                return filter_var($value, FILTER_VALIDATE_BOOLEAN);
            case 'integer':
                return (int) $value;
            case 'float':
                return (float) $value;
            case 'array':
                return json_decode($value, true);
            default:
                return $value;
        }
    }

    /**
     * Refresh mail configuration
     */
    public static function refreshMailConfig()
    {
        $settings = self::all()->pluck('value', 'key');

        if ($settings->isNotEmpty()) {
            // Update mail configuration
            Config::set([
                'mail.default' => $settings->get('MAIL_MAILER', 'smtp'),
                'mail.mailers.smtp.host' => $settings->get('MAIL_HOST', 'localhost'),
                'mail.mailers.smtp.port' => (int) $settings->get('MAIL_PORT', 587),
                'mail.mailers.smtp.username' => $settings->get('MAIL_USERNAME'),
                'mail.mailers.smtp.password' => $settings->get('MAIL_PASSWORD'),
                'mail.mailers.smtp.encryption' => $settings->get('MAIL_ENCRYPTION', 'tls'),
                'mail.from.address' => $settings->get('MAIL_FROM_ADDRESS'),
                'mail.from.name' => $settings->get('MAIL_FROM_NAME', config('app.name')),
            ]);

            // Clear mail manager instance to apply new config
            app()->forgetInstance('mail.manager');
        }
    }

    /**
     * Get all settings as key-value pairs
     */
    public static function getAllSettings()
    {
        return Cache::remember('all_email_settings', 3600, function () {
            return self::all()->pluck('value', 'key');
        });
    }
}