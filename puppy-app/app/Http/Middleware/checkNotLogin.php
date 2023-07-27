<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkNotLogin
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
        if (!$request->hasCookie('Admin') or !$request->session()->exists('User')) {
            return redirect('/login');
        }
        return $next($request);
    }
}
