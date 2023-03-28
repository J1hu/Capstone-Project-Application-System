<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendingApplicantController extends Controller
{
    public function index()
    {
        $applicants = DB::table('applicants')->where('applicant_status_id', 1)->simplePaginate(15);
        return view('applicants.pendinglist', compact('applicants'));
    }
}
