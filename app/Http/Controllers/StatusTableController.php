<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusTableController extends Controller
{
    public function preassessmentList()
    {
        $user = Auth::user();

        $applicants = Applicant::whereHas('application_status', function ($query) {
            $query->where('application_status_name', 'filled');
        })->get();

        // Check if the authenticated user has the role 'program_head'
        if ($user->hasRole('program_head')) {
            $programIds = $user->programs->pluck('id')->toArray();
            $applicants = $applicants->whereIn('program_id', $programIds);
        }
        return view('tables.preassessment', compact('applicants'));
    }

    public function forExamList()
    {
        $user = Auth::user();

        $applicants = Applicant::whereHas('application_status', function ($query) {
            $query->where('application_status_name', 'for exam');
        })->get();

        // Check if the authenticated user has the role 'program_head'
        if ($user->hasRole('program_head')) {
            $programIds = $user->programs->pluck('id')->toArray();
            $applicants = $applicants->whereIn('program_id', $programIds);
        }
        return view('tables.examination', compact('applicants'));
    }

    public function forInterviewList()
    {
        $user = Auth::user();

        $applicants = Applicant::whereHas('application_status', function ($query) {
            $query->where('application_status_name', ['for interview', 'passed exam']);
        })->get();

        // Check if the authenticated user has the role 'program_head'
        if ($user->hasRole('program_head')) {
            $programIds = $user->programs->pluck('id')->toArray();
            $applicants = $applicants->whereIn('program_id', $programIds);
        }
        return view('tables.interview', compact('applicants'));
    }

    public function forFinalAssessmentList()
    {
        $user = Auth::user();

        $applicants = Applicant::whereHas('application_status', function ($query) {
            $query->where('application_status_name', 'passed interview');
        })->get();

        // Check if the authenticated user has the role 'program_head'
        if ($user->hasRole('program_head')) {
            $programIds = $user->programs->pluck('id')->toArray();
            $applicants = $applicants->whereIn('program_id', $programIds);
        }
        return view('tables.final-assessment', compact('applicants'));
    }
}
