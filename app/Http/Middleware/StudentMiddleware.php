<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class StudentMiddleware
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
        Auth::shouldUse('student');
        if(Auth::check()){
            return $next($request);
        }elseif(Auth::guard('employee')->check()){
            return redirect('/teachingCenter');///media
        }elseif(Auth::guard('school')->check()){
            return redirect('/adminArchives');
        }
    }
}
