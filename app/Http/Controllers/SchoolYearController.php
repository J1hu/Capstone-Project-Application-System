<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{
    public function index()
    {

        $schoolYears = SchoolYear::all();

        return view('schoolyear.list', compact('schoolYears'));
    }

    public function create()
    {
        return view('schoolyear.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'year' => 'required',
        ]);

        $validatedData['is_archived'] = 0; // Set the default value of is_archived to 0

        SchoolYear::create($validatedData);

        return redirect()->route('school-years.list');
    }


    public function listBatches($schoolYearId)
    {
        $schoolYear = SchoolYear::findOrFail($schoolYearId);
        $batches = $schoolYear->batches;

        $applicants = collect(); // Create an empty collection to store all applicants

        foreach ($batches as $batch) {
            $batchApplicants = $batch->applicants; // Retrieve applicants for each batch
            $applicants = $applicants->concat($batchApplicants); // Concatenate the applicants to the main collection
        }

        return view('schoolyear.batches', compact('batches', 'schoolYear', 'applicants'));
    }

    public function archive($id)
    {
        $schoolYear = SchoolYear::findOrFail($id);
        $schoolYear->update(['is_archived' => 1]);

        return redirect()->route('school-years.list');
    }
}
