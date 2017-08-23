<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session;
use App;
use Illuminate\Support\Facades\Config;

class GetLang
{
    /**
     *
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Session::has('locale')) {
            $locale = \Session::get('locale', Config::get('app.locale'));
        } else {
            $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
            if ($locale != 'ru' && $locale != 'en' && $locale != 'es' ) {
                $locale = 'en';
            }elseif ($locale == 'ru'){
                $locale = 'ru';
            }elseif ($locale == 'en'){
                $locale = 'en';
            }elseif ( $locale == 'es'){
                $locale = 'es';
            }
        }

        \App::setLocale($locale);

        return $next($request);
    }
}