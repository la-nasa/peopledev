<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LocalizationMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Priorité 1: Paramètre de query string (le plus fort)
        if ($request->has('lang')) {
            $lang = $request->query('lang');
            if (in_array($lang, ['en', 'fr'])) {
                $this->setLocale($lang);
                return redirect()->to($this->removeLangParam($request->fullUrl()));
            }
        }

        // Priorité 2: Session
        if (Session::has('locale')) {
            $locale = Session::get('locale');
            if (in_array($locale, ['en', 'fr'])) {
                App::setLocale($locale);
                return $next($request);
            }
        }

        // Priorité 3: Cookie
        if ($request->hasCookie('locale')) {
            $locale = $request->cookie('locale');
            if (in_array($locale, ['en', 'fr'])) {
                $this->setLocale($locale);
                return $next($request);
            }
        }

        // Priorité 4: Header Accept-Language du navigateur
        $browserLanguage = substr($request->server('HTTP_ACCEPT_LANGUAGE', 'fr'), 0, 2);
        $locale = in_array($browserLanguage, ['en', 'fr']) ? $browserLanguage : 'fr';
        
        $this->setLocale($locale);

        return $next($request);
    }

    /**
     * Définir la locale et la persister
     */
    private function setLocale($locale)
    {
        App::setLocale($locale);
        Session::put('locale', $locale);
        
        // Cookie pour 1 an
        cookie()->queue('locale', $locale, 60 * 24 * 365);
    }

    /**
     * Retirer le paramètre lang de l'URL pour éviter les doublons
     */
    private function removeLangParam($url)
    {
        return preg_replace('/([?&])lang=[^&]*(&|$)/', '$1', $url);
    }
}