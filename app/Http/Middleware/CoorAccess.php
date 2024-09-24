<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CoorAccess
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
        if(!(Auth::user()->role->id == '2')){
            // return 'coor';
            return redirect('/access/invalid');
        }
        return $next($request);
    }
}
