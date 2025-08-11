<?php

// File: app/Helpers/InvoiceSettings.php

namespace App\Helpers;

use App\Models\InvoiceSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InvoiceSettings
{
    /**
     * Cache duration in minutes
     */
    private const CACHE_DURATION = 60;

    /**
     * Get a setting value with caching
     */
    public static function get(string $key, $default = null)
    {
        return Cache::remember("invoice_setting.{$key}", self::CACHE_DURATION, function () use ($key, $default) {
            $setting = InvoiceSetting::where('key', $key)->first();
            
            if (!$setting) {
                return $default;
            }

            return self::castValue($setting->value, $setting->type);
        });
    }

    /**
     * Set a setting value and clear cache
     */
    public static function set(string $key, $value, string $type = 'text'): bool
    {
        try {
            // Convert value for storage
            $storageValue = self::prepareForStorage($value, $type);
            
            InvoiceSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $storageValue, 'type' => $type]
            );

            // Clear cache
            Cache::forget("invoice_setting.{$key}");
            
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get multiple settings at once
     */
    public static function getMany(array $keys): array
    {
        $result = [];
        foreach ($keys as $key) {
            $result[$key] = self::get($key);
        }
        return $result;
    }

    /**
     * Get all company information
     */
    public static function getCompanyInfo(): array
    {
        return self::getMany([
            'company_name',
            'company_address',
            'company_phone',
            'company_email',
            'company_website',
            'company_logo'
        ]);
    }

    /**
     * Get all invoice configuration
     */
    public static function getInvoiceConfig(): array
    {
        return self::getMany([
            'invoice_prefix',
            'invoice_number_length',
            'invoice_template',
            'invoice_footer',
            'invoice_notes'
        ]);
    }

    /**
     * Get all currency settings
     */
    public static function getCurrencySettings(): array
    {
        return self::getMany([
            'default_currency',
            'currency_symbol',
            'currency_position',
            'decimal_places',
            'thousand_separator',
            'decimal_separator'
        ]);
    }

    /**
     * Get all tax settings
     */
    public static function getTaxSettings(): array
    {
        return self::getMany([
            'default_tax_rate',
            'tax_name',
            'include_tax'
        ]);
    }

    /**
     * Get formatted currency display
     */
    public static function formatCurrency(float $amount): string
    {
        $symbol = self::get('currency_symbol', '$');
        $position = self::get('currency_position', 'before');
        $decimalPlaces = (int) self::get('decimal_places', 2);
        $thousandSeparator = self::get('thousand_separator', ',');
        $decimalSeparator = self::get('decimal_separator', '.');

        $formattedAmount = number_format($amount, $decimalPlaces, $decimalSeparator, $thousandSeparator);

        return $position === 'before' 
            ? $symbol . $formattedAmount 
            : $formattedAmount . $symbol;
    }

    /**
     * Get company logo URL
     */
    public static function getCompanyLogoUrl(): ?string
    {
        $logo = self::get('company_logo');
        return $logo ? Storage::disk('public')->url($logo) : null;
    }

    /**
     * Get next invoice number
     */
    public static function getNextInvoiceNumber(): string
    {
        $prefix = self::get('invoice_prefix', 'INV');
        $length = (int) self::get('invoice_number_length', 6);
        
        // Get the last invoice number from your invoice model
        // This is just an example - adjust based on your Invoice model
        $lastInvoice = DB::table('invoices')->orderBy('id', 'desc')->first();
        $nextNumber = $lastInvoice ? ($lastInvoice->id + 1) : 1;
        
        return $prefix . str_pad($nextNumber, $length, '0', STR_PAD_LEFT);
    }

    /**
     * Get email template with variables replaced
     */
    public static function getEmailTemplate(string $type, array $variables = []): string
    {
        $template = self::get("email_{$type}_template", '');
        
        foreach ($variables as $key => $value) {
            $template = str_replace("{{$key}}", $value, $template);
        }
        
        return $template;
    }

    /**
     * Get payment methods as array
     */
    public static function getPaymentMethods(): array
    {
        $methods = self::get('payment_methods', '{}');
        return is_string($methods) ? json_decode($methods, true) ?? [] : $methods;
    }

    /**
     * Check if tax should be included by default
     */
    public static function shouldIncludeTax(): bool
    {
        return (bool) self::get('include_tax', false);
    }

    /**
     * Get default tax rate as float
     */
    public static function getDefaultTaxRate(): float
    {
        return (float) self::get('default_tax_rate', 0);
    }

    /**
     * Get payment terms in days
     */
    public static function getPaymentTerms(): int
    {
        return (int) self::get('default_payment_terms', 30);
    }

    /**
     * Format date according to setting
     */
    public static function formatDate($date): string
    {
        $format = self::get('date_format', 'Y-m-d');
        return is_string($date) ? date($format, strtotime($date)) : $date->format($format);
    }

    /**
     * Clear all settings cache
     */
    public static function clearCache(): void
    {
        $keys = InvoiceSetting::pluck('key');
        foreach ($keys as $key) {
            Cache::forget("invoice_setting.{$key}");
        }
    }

    /**
     * Cast value based on type
     */
    private static function castValue($value, string $type)
    {
        return match ($type) {
            'boolean' => $value === '1' || $value === 'true' || $value === true,
            'number' => is_numeric($value) ? (float) $value : 0,
            'json' => is_string($value) ? json_decode($value, true) : $value,
            'image' => $value ? Storage::disk('public')->url($value) : null,
            default => $value
        };
    }

    /**
     * Prepare value for storage
     */
    private static function prepareForStorage($value, string $type): ?string
    {
        return match ($type) {
            'boolean' => $value ? '1' : '0',
            'json' => is_array($value) ? json_encode($value) : $value,
            'number' => (string) $value,
            default => (string) $value
        };
    }

    /**
     * Validate setting value
     */
    public static function validate(string $key, $value, string $type): bool
    {
        return match ($type) {
            'email' => filter_var($value, FILTER_VALIDATE_EMAIL) !== false,
            'url' => filter_var($value, FILTER_VALIDATE_URL) !== false,
            'number' => is_numeric($value),
            'json' => json_decode($value) !== null,
            default => true
        };
    }

    /**
     * Get all settings for export/backup
     */
    public static function exportSettings(): array
    {
        return InvoiceSetting::all()->keyBy('key')->map(function ($setting) {
            return [
                'value' => $setting->value,
                'type' => $setting->type,
                'updated_at' => $setting->updated_at
            ];
        })->toArray();
    }

    /**
     * Import settings from array
     */
    public static function importSettings(array $settings): bool
    {
        try {
            DB::transaction(function () use ($settings) {
                foreach ($settings as $key => $data) {
                    InvoiceSetting::updateOrCreate(
                        ['key' => $key],
                        [
                            'value' => $data['value'],
                            'type' => $data['type']
                        ]
                    );
                }
            });
            
            self::clearCache();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}