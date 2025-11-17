<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ellenőrizzük, van-e sessionben nyelv
        $locale = Session::get('locale', config('app.locale'));

        // Biztonság kedvéért csak engedélyezett nyelvek
        if (!in_array($locale, ['hu', 'en', 'de'])) {
            $locale = config('app.locale'); // fallback
        }

        // Nyelv beállítása
        App::setLocale($locale);
        
        return $next($request);
    }
}
