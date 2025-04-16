<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$roles): Response
    {
        // if(Auth::check() && Auth::user()->hasAnyRole($roles)){
        //     return $next($request);
        // }
        // Auth::logout();
        //     return back()->withErrors([
        //         'email'=>'You do not have access to the admin area.'
        //     ]);

         // Check if the user is authenticated
         if (!Auth::check()) {
            return redirect('/admin/login');
        }

        // Check if the authenticated user has the required roles
        if (Auth::user()->hasAnyRole($roles)) {
            return $next($request);
        }

        // If the user does not have the required role, log them out and redirect back with an error
        Auth::logout();
        return redirect('/admin/login')->withErrors([
            'email' => 'You do not have access to the admin area.'
        ]);
        
    }
}
