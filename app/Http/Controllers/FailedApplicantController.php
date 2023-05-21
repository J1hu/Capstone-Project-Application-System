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
        $allowedStatuses = [
            'failed interview',
            'failed exam',
            'backed out',
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
}
