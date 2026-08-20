<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSession
{
    public function handle(Request $request, Closure $next): Response
    {
        // User must be logged in
        if (!session()->has('user_id')) {
            return redirect('/login')
                ->withErrors([
                    'email' => 'Please log in to access this page.',
                ]);
        }

        // 30-minute inactivity timeout
        $timeout = 1800;

        $lastActivity = session('last_activity');

        if ($lastActivity && (time() - $lastActivity) > $timeout) {

            $request->session()->flush();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/login')
                ->withErrors([
                    'email' => 'Your session has expired. Please log in again.',
                ]);
        }

        // Update activity timestamp
        session([
            'last_activity' => time(),
        ]);

        return $next($request);
    }
}