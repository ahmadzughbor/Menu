<?php
// app/Http/Middleware/SetLanguage.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLanguage
{
    public function handle($request, Closure $next)
    {

        // dd(session()->has('locale'));
        if (session()->has('locale')) {
            App::setLocale(session('locale'));
        }

        

        return $next($request);
    }
}
