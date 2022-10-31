<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::user())
        {
            return redirect('/');
        }
        if (Auth::user()->username !== 'Karim98')
        {
            return abort(Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
