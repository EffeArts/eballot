<?php

namespace App\Http\Middleware;

use Closure;

class SudoMiddleware
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
        if ($request->user() && $request->user()->role_id != 1)

        {
            // return redirect('/home');
            return back();

        }

        return $next($request);
    }
}
