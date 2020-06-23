<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CookieMiddleware
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
        if(isset($_COOKIE['user'])){
            $user = $_COOKIE['user'];
        }else{
            $user = 'none';
        }
        $request->merge(compact('user'));
        return $next($request);
    }
}
