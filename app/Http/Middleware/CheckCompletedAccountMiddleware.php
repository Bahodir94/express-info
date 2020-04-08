<?php

namespace App\Http\Middleware;

use Closure;

class CheckCompletedAccountMiddleware
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
        $user = auth()->user();
        if ($user) {
            if ($user->checkCompletedAccount())
                return $next($request);
            else
                return redirect('/account/create');
        }

        return redirect()->route('login');
    }
}
