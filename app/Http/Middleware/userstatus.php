<?php

namespace App\Http\Middleware;

use Closure, Auth;
use Illuminate\Http\Request;

class userstatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->status != 2 ):

            return $next($request);

        else:

            return redirect('/logout');

        endif;
    }
}
