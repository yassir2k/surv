<?php

namespace App\Http\Middleware;

use Closure, Auth;
use Illuminate\Http\Request;

class CheckAuth
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
        if ((Auth::check() == false)) {
            return redirect()->intended('/admin')
            ->with('error','Only Authorized users are allowed to access the resource.');
        }
        return $next($request);
    }
}
