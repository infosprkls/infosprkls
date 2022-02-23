<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureIsAcceptValid
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
        
        if (Auth::check()){
            if (auth()->user()->is_accept==0){
                return redirect(route('useraccept.create'));
            }
        }else{
            return redirect(route('login'));
        }

        return $next($request);
    }
}
