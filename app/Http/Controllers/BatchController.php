<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function showActiveBatches()
    {
        $batches = Batch::where('is_archived', false)
            ->with('applicant')
            ->get();

        return view('batches.list', compact('batches'));
    }
}
