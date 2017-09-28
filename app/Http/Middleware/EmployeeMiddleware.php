<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class EmployeeMiddleware
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
        if(Auth::guard('employee')->check()){
            return $next($request);
        }elseif(Auth::guard('student')->check()){
            return redirect('/learningCenter');///media
        }elseif(Auth::guard('school')->check()){
            return redirect('/adminArchives');
        }
    }
}
