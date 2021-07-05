<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guards = null)
    {
       // $guards = empty($guards) ? [null] : $guards;

     //   foreach ($guards as $guard) {
            if (Auth::guard($guards)->check()) {
                if ($guards == 'admin')
                    return redirect(RouteServiceProvider::Admin);
                  else
                    return redirect(RouteServiceProvider::HOME);
            }
            return $next($request);
        }
  //  }
}
