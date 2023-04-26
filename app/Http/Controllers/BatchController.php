<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function showApplicants($batch_num)
    {
        $batch = Batch::where('batch_num', $batch_num)
            ->where('is_archived', false)
            ->with('applicant')
            ->firstOrFail();

        return view('students', compact('batch'));
    }
}
