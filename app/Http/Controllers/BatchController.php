<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function showActiveBatches()
    {

        $batches = Batch::where('is_archived', false)
            ->with('applicants')
            ->orderBy('batch_num', 'asc')
            ->get();


        return view('batches.list', compact('batches'));
    }


    public function showArchivedBatches()
    {
        $batches = Batch::where('is_archived', true)
            ->with('applicants')
            ->orderBy('batch_num', 'asc')
            ->get();

        return view('batches.archived-list', compact('batches'));
    }

    public function archive()
    {
        $batches = Batch::where('is_archived', false)->get();
        foreach ($batches as $batch) {
            $batch->is_archived = true;
            $batch->save();
        }

        return redirect()->route('batches.list')->with('success', 'All active batches have been archived.');
    }


    public function unarchive()
    {
        $batches = Batch::where('is_archived', true)->get();
        foreach ($batches as $batch) {
            $batch->is_archived = false;
            $batch->save();
        }

        return redirect()->route('batches.archived-list')->with('success', 'All archived batches has been removed to archives.');
    }
}
