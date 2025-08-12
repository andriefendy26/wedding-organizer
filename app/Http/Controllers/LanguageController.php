<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Change the application language
     *
     * @param Request $request
     * @param string $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeLanguage(Request $request, $locale)
    {
        // Validate locale
        $availableLocales = ['en', 'id'];
        
        if (!in_array($locale, $availableLocales)) {
            $locale = 'en';
        }
        
        // Store locale in session
        Session::put('locale', $locale);
        
        // Redirect back to previous page or home
        return redirect()->back();
    }
    
    /**
     * Get current language
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCurrentLanguage()
    {
        $locale = Session::get('locale', 'en');
        
        $languages = [
            'en' => [
                'code' => 'en',
                'name' => 'English',
                'flag' => 'https://flagcdn.com/w20/us.png'
            ],
            'id' => [
                'code' => 'id',
                'name' => 'Bahasa Indonesia',
                'flag' => 'https://flagcdn.com/w20/id.png'
            ]
        ];
        
        return response()->json([
            'current' => $languages[$locale],
            'available' => $languages
        ]);
    }
}
