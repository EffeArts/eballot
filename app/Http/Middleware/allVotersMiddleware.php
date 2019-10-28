<?php

namespace App\Http\Middleware;

use Closure;

class allVotersMiddleware
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
        if ($request->user()->role_id < 5)

        {
            
        return $next($request);

        }
        else{
            return back();
        }

        
    }
}
