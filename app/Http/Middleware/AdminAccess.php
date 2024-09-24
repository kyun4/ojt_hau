<?php

namespace App\Http\Middleware;
// Added by Kiks
use Illuminate\Support\Facades\Log;

use Closure;
use Auth;
class AdminAccess
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
        Log::info('Username: '. Auth::user());
        if(!(Auth::user()->role->id == '4')){
            // return "admin";
            return redirect('/access/invalid');
        }
        return $next($request);
    }
}
