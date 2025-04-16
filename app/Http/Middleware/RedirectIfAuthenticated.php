<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards): mixed
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}