<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
//        dd($request->segments(1));
        $locale = $request->segment(1);

        if (in_array($locale, ['en', 'fr'])) {
            App::setLocale($locale);
        }
        else {
            $locale = null;
            App::setLocale($locale);
        }

//        dd($locale);
        return $next($request);
    }
}
