<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $defaut_locale = 'ar';
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        } else {
            session()->put('locale', $defaut_locale);
            app()->setLocale($defaut_locale);
        }

        return $next($request);
    }
}
