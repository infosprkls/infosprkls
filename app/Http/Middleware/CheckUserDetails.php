<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserDetails
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
            if (!isset(auth()->user()->firstname)){
                return redirect(route('profile.edit', \auth()->id()))->withErrors(["msg"=>"Please fill in all of your account's details before proceeding."]);
            }
        }else{
            return redirect(route('login'));
        }

        return $next($request);
    }
}
