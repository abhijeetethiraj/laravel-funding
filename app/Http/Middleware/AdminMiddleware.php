<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // User not logged in
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
