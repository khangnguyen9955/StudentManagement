<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && Auth::user()->role == 1) {
                return redirect()->route('student.list');
            } else if (Auth::guard($guard)->check() && Auth::user()->role == 2) {
                return redirect()->route('profile.student');
            } else if (Auth::guard($guard)->check() && Auth::user()->role == 3) {
                return redirect()->route('profile.lecturer');
            }
        }
        return $next($request);
    }
}
