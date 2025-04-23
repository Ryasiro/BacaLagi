<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        Log::info('Middleware IsAdmin dipanggil.');

        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        Log::warning('Akses ditolak di IsAdmin middleware');
        abort(403, 'Akses hanya untuk admin.');

        
    }
}