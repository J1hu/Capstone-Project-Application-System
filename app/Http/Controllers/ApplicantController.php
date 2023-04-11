<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\View\View;

class ApplicantController extends Controller
{
    public function index(Request $request): View
    {
        // $user = User::find(auth()->user()->id);
        // , compact('user')

        return view('applicants.dashboard', [
            'user' => $request->user(),
        ]);
        // return view('applicants.dashboard');
    }

    public function viewForm()
    {
        return view('applicants.form');
    }

    public function view(Request $request): View
    {
        return view('applicants.profile', [
            'user' => $request->user(),
        ]);
    }

    // public function profile(Request $request): View
    // {
    //     return view('applicants.profile', [
    //         'user' => $request->user(),
    //     ]);
    // }

}
