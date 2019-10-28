<?php

namespace App\Http\Middleware;

use Closure;

class AdminsMiddleware
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
        if ($request->user()->role_id == 1 || $request->user()->role_id == 2)

        {
            
        return $next($request);

        }
        else{
            return back();
        }

        
    }
}
