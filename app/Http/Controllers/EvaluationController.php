<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preassessment;
use Auth;

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

        Preassessment::create($validatedData);

        return redirect()->back()->with('success', 'Preassessment created successfully.');
    }
}
