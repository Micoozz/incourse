<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SchoolMiddleware
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
        if(Auth::guard('school')->check()){
            return $next($request);
        }
        return redirect('/media');
    }
}