<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }
        if ( $user->hasRole('admin') ) {
            return redirect()->route('admin.home');
        }elseif ( $user->hasRole('kepalasekolah') ) {
            return redirect()->route('kepalasekolah.home');
        }elseif ( $user->hasRole('kurikulum') ) {
            return redirect()->route('kurikulum.home');
        }elseif ( $user->hasRole('guru') ) {
            return redirect()->route('guru.home');
        }elseif ( $user->hasRole('supervisor') ) {
            return redirect()->route('supervisor.home');
        }

        return $next($request);
    }
}
