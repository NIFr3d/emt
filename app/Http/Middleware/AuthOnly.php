<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;

class AuthOnly
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
        if(session('acces')==NULL){
            return redirect('/cookieAuth');
        }
        return $next($request);
    }
}
