<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FailedApplicantController extends Controller
{
    public function index()
    {
        $user = Auth::user();


        $latestSchoolYear = SchoolYear::where('is_archived', false)->latest()->first();

        if ($latestSchoolYear === null || $latestSchoolYear->batches->isEmpty()) {
            return view('applicants.failedlist')->with('message', 'There are no active batches. Did you forgot to create a new School Year?');
        }

        $allowedStatuses = [
            'failed interview',
            'failed exam',
            'backed out',
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

        return view('applicants.failedlist', compact('applicants'));
    }
}
