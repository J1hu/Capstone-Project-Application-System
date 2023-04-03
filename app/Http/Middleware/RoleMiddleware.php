<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role)
    {
        // redirect to admin dashboard for admin, program_head, mancom, or registrar_staff
        if (Auth::user()->hasAnyRole(['admin', 'program_head', 'mancom', 'registrar_staff']) && $request->routeIs('dashboard')) {
            return $next($request);
        } elseif (Auth::user()->hasAnyRole(['admin', 'program_head', 'mancom', 'registrar_staff'])) {
            return redirect()->route('dashboard');
        }
        // redirect to applicant dashboard for applicants
        if (Auth::user()->hasRole('applicant') && $request->routeIs('applicant.dashboard')) {
            return $next($request);
        } elseif (Auth::user()->hasRole('applicant')) {
            return redirect()->route('applicant.dashboard');
        }

        abort(403, 'Unauthorized');
    }
}
