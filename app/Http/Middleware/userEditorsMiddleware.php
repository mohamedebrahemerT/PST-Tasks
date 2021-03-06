<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class userEditorsMiddleware
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
        if (Auth::check() && Auth::user()->type == 'super admin' || Auth::check() && Auth::user()->type == 'admin') {
            return $next($request);
        } else {
            return redirect()->route('home')->with('danger',trans('admin.preventAlert'));

        }
    }
}
