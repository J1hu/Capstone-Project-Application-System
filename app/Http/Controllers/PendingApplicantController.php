<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\Auth;

class PendingApplicantController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $latestSchoolYear = SchoolYear::where('is_archived', false)->latest()->first();

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

        $applicants = collect();

        foreach ($latestSchoolYear->batches as $batch) {
            $batchApplicants = $batch->applicants()
                ->whereHas('application_status', function ($query) use ($allowedStatuses) {
                    $query->whereIn('application_status_name', $allowedStatuses);
                })
                ->get();

            $applicants = $applicants->concat($batchApplicants);
        }

        // Check if the authenticated user has the role 'program_head'
        if ($user->hasRole('program_head')) {
            $programIds = $user->programs->pluck('id')->toArray();
            $applicants = $applicants->whereIn('program_id', $programIds);
        }

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
