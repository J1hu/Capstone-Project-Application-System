<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Applicant;
use App\Models\ExamScore;
use Illuminate\Http\Request;
use App\Models\Preassessment;
use App\Models\FinalAssessment;
use App\Models\ApplicationStatus;
use App\Models\InitialAssessment;
use App\Events\PreassessmentUpdated;


class EvaluationController extends Controller
{
    public function preassessment(Request $request)
    {
        $userId = Auth::user()->id;

        $validatedData = $request->validate([
            'applicant_id' => 'required',
            'is_approved' => 'required|boolean',
            'remarks' => 'required',
        ], [
            'applicant_id.required' => 'The applicant id field is required.',
            'is_approved.required' => 'The is approved field is required.',
            'is_approved.boolean' => 'The is approved field must be a boolean value.',
            'remarks.required' => 'The remarks field is required.',
        ]);

        $validatedData['user_id'] = $userId;

        $preassessment = Preassessment::create($validatedData); // Assign the created Preassessment instance to $preassessment

        // Dispatch the PreassessmentUpdated event with the created Preassessment instance
        event(new PreassessmentUpdated($preassessment));

        return redirect()->back()->with('success', 'Preassessment created successfully.');
    }

    public function examScore(Request $request)
    {
        $validatedData = $request->validate([
            'applicant_id' => 'required',
            'intelligence_score' => 'required|integer|min:0|max:100',
            'aptitude_score' => 'required|integer|min:0|max:100',
        ]);

        $examScore = ExamScore::create([
            'applicant_id' => $request->input('applicant_id'),
            'intelligence_score' => $request->input('intelligence_score'),
            'aptitude_score' => $request->input('aptitude_score'),
            'average_score' => ($request->input('intelligence_score') + $request->input('aptitude_score')) / 2,
        ]);

        if (!$examScore) {
            return redirect()->back()->with('error', $validatedData);
        }

        return redirect()->back()->with('success', 'Exam Score created successfully.');
    }

    public function initialAssessment(Request $request)
    {
        $validatedData = $request->validate([
            'applicant_id' => 'required',
            'remarks' => 'required',
            'scholarship_type' => 'required',
        ]);

        InitialAssessment::create($validatedData);

        return redirect()->back()->with('success', 'Initial Assessment created successfully.');
    }

    public function updateApplicationStatus(Request $request)
    {
        $validatedData = $request->validate([
            'applicant_id' => 'required',
            'application_status' => 'required',
        ]);

        $applicantId = $validatedData['applicant_id'];
        $applicant = Applicant::findOrFail($applicantId);

        $applicationStatusName = $validatedData['application_status'];
        $applicationStatus = ApplicationStatus::where('application_status_name', $applicationStatusName)->firstOrFail();

        $applicant->application_status()->associate($applicationStatus);

        $applicant->save();

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }


    public function finalAssessment(Request $request)
    {
        $validatedData = $request->validate([
            'applicant_id' => 'required',
            'remarks' => 'required',
            'scholarship_type' => 'required',
        ]);

        FinalAssessment::create($validatedData);

        return redirect()->back()->with('success', 'Initial Assessment created successfully.');
    }
}
