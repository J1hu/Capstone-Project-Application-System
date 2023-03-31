<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use DB;
use Illuminate\Http\Request;

class EvaluatedApplicantController extends Controller
{
    public function index()
    {
        $applicants = Applicant::with(['user', 'program', 'applicant_status'])->where('applicant_status_id', 2)->simplePaginate(15);
        return view('applicants.evaluatedlist', compact('applicants'));
    }
}
