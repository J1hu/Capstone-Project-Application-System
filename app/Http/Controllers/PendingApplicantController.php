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
        $user = Auth::user();
        $allowedStatuses = [
            'verified',
            'filled',
            'pending',
            'file resubmit',
            'for exam',
            'passed exam',
            'for interview',
            'passed interview',
            'for orientation'
        ];

        $applicants = Applicant::with(['user', 'program', 'application_status'])
            ->whereHas('application_status', function ($query) use ($allowedStatuses) {
                $query->whereIn('application_status_name', $allowedStatuses);
            })
            ->whereHas('batch', function ($query) {
                $query->where('is_archived', false);
            });

        // Check if the authenticated user has the role 'program_head'
        if ($user->hasRole('program_head')) {
            $programIds = $user->programs->pluck('id')->toArray();
            $applicants->whereIn('program_id', $programIds);
        }

        $applicants = $applicants->paginate(15);

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
