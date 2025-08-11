<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed get(string $key, $default = null)
 * @method static bool set(string $key, $value, string $type = 'text')
 * @method static array getMany(array $keys)
 * @method static array getCompanyInfo()
 * @method static array getInvoiceConfig()
 * @method static array getCurrencySettings()
 * @method static array getTaxSettings()
 * @method static string formatCurrency(float $amount)
 * @method static string|null getCompanyLogoUrl()
 * @method static string getNextInvoiceNumber()
 * @method static string getEmailTemplate(string $type, array $variables = [])
 * @method static array getPaymentMethods()
 * @method static bool shouldIncludeTax()
 * @method static float getDefaultTaxRate()
 * @method static int getPaymentTerms()
 * @method static string formatDate($date)
 * @method static void clearCache()
 * @method static bool validate(string $key, $value, string $type)
 * @method static array exportSettings()
 * @method static bool importSettings(array $settings)
 */
class InvoiceSettings extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'invoice-settings';
    }
}