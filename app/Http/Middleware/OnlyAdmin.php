<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class OnlyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            if (Auth::user()->role != 1) {
                if ($request->ajax() || $request->wantsJson()) {
                    return response('Unauthorized.', 401);
                } else {
                    return redirect()->guest('/');
                }
            }
        }
        return $next($request);
    }
}
