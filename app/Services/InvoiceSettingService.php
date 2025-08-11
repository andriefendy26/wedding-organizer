<?php

// File: app/Providers/InvoiceSettingsServiceProvider.php

namespace App\Providers;

use App\Helpers\InvoiceSettings;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class InvoiceSettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('invoice-settings', function () {
            return new InvoiceSettings();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Register blade directives for easy use in templates
        Blade::directive('invoiceSetting', function ($key) {
            return "<?php echo \App\Helpers\InvoiceSettings::get($key); ?>";
        });

        Blade::directive('formatCurrency', function ($amount) {
            return "<?php echo \App\Helpers\InvoiceSettings::formatCurrency($amount); ?>";
        });

        Blade::directive('companyLogo', function () {
            return "<?php echo \App\Helpers\InvoiceSettings::getCompanyLogoUrl(); ?>";
        });
    }
}

// File: app/Facades/InvoiceSettings.php

