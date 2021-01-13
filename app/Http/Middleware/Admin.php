<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
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
        if($request->user() && $request->user()->role->name == "Admin" ){
            return $next($request);
        }else{
            return redirect()->back()->withErrors("Vous n'avez pas les droits suffisant pour accèder à cette page.");
        }
    }
}
