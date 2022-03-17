<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsActiveMiddleware
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
        if(auth()->user()->status == 'inactivo'){

            if(auth()->user()){
                auth()->logout();
            }

            return redirect()->route('login')->with('message', 'Tu cuenta esta inactiva contacta al administrador para activarla.');
        }

        return $next($request);
    }
}
