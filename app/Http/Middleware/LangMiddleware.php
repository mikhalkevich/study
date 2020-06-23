<?php

namespace App\Http\Middleware;

use Closure;

class LangMiddleware
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
        $lang = 'ru';
       if(isset($_GET['lang'])){
           $lang = $_GET['lang'];
       }else{
           if(isset($_COOKIE['lang'])){
               $lang = $_COOKIE['lang'];
           }else{
               $lang = @substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
           }
       }
       setcookie('lang', $lang, time()+3600, '/');
        $request->merge(compact('lang'));
        return $next($request);
    }
}
