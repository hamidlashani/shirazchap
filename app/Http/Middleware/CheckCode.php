<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCode
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
        if(!$request->user()->cellphone_verified){
           return redirect(url('/profile/'.$request->user()->id.'/edit'));
        }

    }
}
