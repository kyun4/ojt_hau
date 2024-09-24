<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class PartnerAccess
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
        
        if(Auth::user()->role->id == '1'){
            // return 'partner';
            return redirect('/student/applications');
        }
        if(!(Auth::user()->role->id == '3')){
            // return 'partner';
            return redirect('/access/invalid');
        }
        return $next($request);
    }
}
