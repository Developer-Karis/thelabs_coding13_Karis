<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedacteurWebmasterAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->role_id == 1 || $request->user()->role_id == 2 || $request->user()->role_id == 3){
            return $next($request);
        }else{
            return redirect('/home')->withErrors("Vous n'avez pas les droits suffisant pour accèder à cette page.");
        }
    }
}
