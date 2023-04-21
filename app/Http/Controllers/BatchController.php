<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Applicant;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function viewBatchForm()
    {
        $batches = Batch::orderBy('batch_num', 'desc')->get();
        $applicants = Applicant::orderBy('lname')->get();

        return view('batches.form', compact('batches', 'applicants'));
    }

    public function massAssignBatch(Request $request)
    {
        $batchId = $request->input('batch_id');
        $applicantIds = $request->input('applicant_ids');

        $batch = Batch::findOrFail($batchId);
        $applicants = Applicant::whereIn('id', $applicantIds)->get();

        foreach ($applicants as $applicant) {
            $applicant->batches()->associate($batch);
            $applicant->saveMany();
        }

        return redirect()->back()->with('success', 'Batch has been assigned to selected applicants');
    }
}
