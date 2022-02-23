<?php

namespace App\Http\Middleware;

use Closure;

class CompanyStatusValidator
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
        
        if (!auth()->user()->hasRole('super admin')){
            if (auth()->user()->company->status === 0){
                return redirect(route('companies.disabled'));
            }
        }

        return $next($request);
    }
}
