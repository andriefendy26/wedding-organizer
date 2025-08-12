<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageHelper
{
    /**
     * Get available languages
     *
     * @return array
     */
    public static function getAvailableLanguages()
    {
        return [
            'en' => [
                'code' => 'en',
                'name' => 'English',
                'flag' => 'https://flagcdn.com/w20/us.png',
                'native_name' => 'English'
            ],
            'id' => [
                'code' => 'id',
                'name' => 'Bahasa Indonesia',
                'flag' => 'https://flagcdn.com/w20/id.png',
                'native_name' => 'Bahasa Indonesia'
            ]
        ];
    }

    /**
     * Get current language
     *
     * @return array
     */
    public static function getCurrentLanguage()
    {
        $locale = App::getLocale();
        $languages = self::getAvailableLanguages();
        
        return $languages[$locale] ?? $languages['en'];
    }

    /**
     * Set language
     *
     * @param string $locale
     * @return void
     */
    public static function setLanguage($locale)
    {
        $availableLanguages = array_keys(self::getAvailableLanguages());
        
        if (in_array($locale, $availableLanguages)) {
            Session::put('locale', $locale);
            App::setLocale($locale);
        }
    }

    /**
     * Get language name by code
     *
     * @param string $code
     * @return string
     */
    public static function getLanguageName($code)
    {
        $languages = self::getAvailableLanguages();
        
        return $languages[$code]['name'] ?? 'Unknown';
    }

    /**
     * Check if language is RTL
     *
     * @param string $locale
     * @return bool
     */
    public static function isRTL($locale = null)
    {
        if (!$locale) {
            $locale = App::getLocale();
        }
        
        // Add RTL languages here if needed
        $rtlLanguages = ['ar', 'he', 'fa', 'ur'];
        
        return in_array($locale, $rtlLanguages);
    }

    /**
     * Get language direction
     *
     * @param string $locale
     * @return string
     */
    public static function getDirection($locale = null)
    {
        return self::isRTL($locale) ? 'rtl' : 'ltr';
    }
}
