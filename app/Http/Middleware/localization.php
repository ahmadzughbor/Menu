<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
// use Cookie;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request ,Closure $next): Response
    {
        $locale = $request->segment(1);
        
        if (isset($locale) && in_array($locale, config('app.available_locales'))) {
            app()->setLocale($locale);
            setcookie("locale", $locale, time()+3600);  
              
        }else{
            $value = $this->getCookie('locale');  
            app()->setLocale($value);
            
            
        }
        
        return $next($request);
    }

   
    public function getCookie($name)
    {
        $value = Cookie::get($name);
        return $value ;
    }
}
