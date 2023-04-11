<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('applicants.dashboard', compact('user'));
    }

    public function viewForm()
    {
        return view('applicants.form');
    }

    public function viewProfile()
    {
        $user = Auth::user();
        $user->load('applicant');
        return view('applicants.profile', compact('user'));
    }
}
