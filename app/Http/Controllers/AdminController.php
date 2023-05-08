<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function viewLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            // Check if the authenticated user has the roles
            if (Auth::user()->hasAnyRole(['admin', 'program_head', 'registrar_staff', 'mancom'])) {
                return redirect()->route('dashboard');
            } else {
                Auth::logout();
                return redirect()->back()->withErrors([
                    'email' => 'You do not have permission to access this dashboard.',
                ]);
            }
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }
}
