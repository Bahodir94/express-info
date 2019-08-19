<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminMiddleware
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
        if(\Auth::check()):
            if(\Auth::user()->isAdmin):
                return $next($request);
            else:
                return redirect('/');
            endif;
        else:
            return redirect('/');
        endif;
    }
}
