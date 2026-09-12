<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsSuperuser
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            abort(401,'Authentication Failed.');
        }
 
        if(!Auth::user()->hasRole('superuser')){
            abort(403,'This action is unauthorized.');
        }
        return $next($request);
    }
}

