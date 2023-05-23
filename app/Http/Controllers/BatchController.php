<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function showActiveBatches()
    {
        $schoolYears = SchoolYear::where('is_archived', false)->with('batches')->get();

        $batches = collect();

        foreach ($schoolYears as $schoolYear) {
            $batches = $batches->concat($schoolYear->batches);
        }

        return view('batches.list', compact('batches'));
    }

    public function showArchivedBatches()
    {
        $schoolYears = SchoolYear::where('is_archived', true)->with('batches')->get();

        $batches = collect();

        foreach ($schoolYears as $schoolYear) {
            $batches = $batches->concat($schoolYear->batches);
        }

        return view('batches.archived-list', compact('batches'));
    }

    public function archive()
    {
        // Get the current school year
        $schoolYear = SchoolYear::where('is_archived', false)->first();

        if ($schoolYear) {
            // Archive the school year
            $schoolYear->is_archived = true;
            $schoolYear->save();

            return redirect()->route('batches.list')->with('success', 'Current school year and its batches have been archived.');
        }

        return redirect()->route('batches.list')->with('error', 'No active school year found.');
    }
}
