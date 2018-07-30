<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AjaxTestMiddleware
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
        if ( !$request->ajax() ) {
            abort(403, 'Request must be ajax!');
        }

        return $next($request);
    }
}
