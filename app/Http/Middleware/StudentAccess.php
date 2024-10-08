<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class StudentAccess
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
        if(!(Auth::user()->role->id == '1')){
            // return "student";
            return redirect('/access/invalid');
        }
        return $next($request);
    }
}
