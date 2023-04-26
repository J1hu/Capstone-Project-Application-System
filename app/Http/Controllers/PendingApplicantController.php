<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PendingApplicantController extends Controller
{
    public function index()
    {
        $applicants = Applicant::with(['user', 'program', 'applicant_status'])->where('applicant_status_id', 1)->simplePaginate(15);
        return view('applicants.pendinglist', compact('applicants'));
    }

    public function viewProfile($id)
    {
        $applicant = Applicant::find($id);

        if (!$applicant) {
            return redirect()->route('applicants.dashboard')->with('error', 'Applicant not found.');
        }

        return view('applicants.profile', ['applicant' => $applicant]);
    }
}
