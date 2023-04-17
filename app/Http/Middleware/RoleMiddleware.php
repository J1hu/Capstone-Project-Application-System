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
        if (Auth::user()->hasAnyRole(['admin', 'program_head', 'mancom', 'registrar_staff'])) {
            if ($request->is('applicant/dashboard')) {
                return redirect()->route('dashboard');
            }
            return $next($request);
        }
        // redirect to applicant dashboard for applicants
        if (Auth::user()->hasRole('applicant')) {
            $applicant = Auth::user()->applicant;
            if ($applicant && $request->is('dashboard')) {
                return redirect()->route('applicants.dashboard');
            }
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
