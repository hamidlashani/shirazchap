<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuthenticated
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
        if(($request->user()->is_superuser) OR ($request->user()->is_staff )){
            //dd($request->user()->is_superuser);

            return $next($request);
        }

        return redirect('/');
    }
}
