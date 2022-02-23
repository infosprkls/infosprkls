<?php

namespace App\Http\Middleware;

use Closure;

class ProjectsStatusValidator
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
            if (auth()->user()->company->project_status === 0){
                return redirect(route('companies.disabled'));
            }
        }

        return $next($request);
    }
}
