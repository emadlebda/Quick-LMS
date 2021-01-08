<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;

class AdminMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request , Closure $next)
    {
        if ( ! auth()->check())
            return redirect('/');
        if (auth()->user()->roles()->whereId(Role::STUDENT_ROLE)->count() > 0)
            return redirect('/');

        return $next($request);
    }
}
