<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FailedApplicantController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $applicants = Applicant::with(['user', 'program', 'applicant_status'])
            ->where('applicant_status_id', 3)
            ->whereHas('batch', function ($query) {
                $query->where('is_archived', false);
            });

        // Check if the authenticated user has the role 'program_head'
        if ($user->hasRole('program_head')) {
            $programIds = $user->programs->pluck('id')->toArray();
            $applicants->whereIn('program_id', $programIds);
        }

        $applicants = $applicants->paginate(15);

        return view('applicants.failedlist', compact('applicants'));
    }
}