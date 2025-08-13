<?php

// app/Providers/EmailSettingsServiceProvider.php
namespace App\Providers;

use App\Models\EmailSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class EmailSettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Load email settings from database after migrations are run
        if ($this->app->runningInConsole()) {
            return;
        }

        try {
            // Check if the email_settings table exists and has data
            if (Schema::hasTable('email_settings')) {
                EmailSetting::refreshMailConfig();
            }
        } catch (\Exception $e) {
            // Silently fail if there's an issue (e.g., during migrations)
            // This prevents the app from crashing during setup
        }
    }
}