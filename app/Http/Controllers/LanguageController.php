<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        // Valider la langue
        if (!in_array($lang, ['en', 'fr'])) {
            return redirect()->back()->with('error', __('messages.Language not supported'));
        }

        // Mettre à jour la session
        Session::put('locale', $lang);
        
        // Mettre à jour l'application locale
        App::setLocale($lang);
        
        // Mettre à jour le cookie pour les visites futures
        $cookie = cookie('locale', $lang, 60 * 24 * 365); // 1 an

        return redirect()->back()
            ->with('success', __('messages.Language changed successfully'))
            ->withCookie($cookie);
    }

    // Méthode pour obtenir la langue actuelle
    public function getCurrentLang()
    {
        return response()->json([
            'locale' => App::getLocale(),
            'session' => Session::get('locale'),
        ]);
    }
}