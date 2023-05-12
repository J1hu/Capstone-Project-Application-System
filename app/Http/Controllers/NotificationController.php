<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Program;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Notifications\ExamNotification;

class NotificationController extends Controller
{
    public function showNotification()
    {
        // $staffs = User::role('registrar_staff')->cursorPaginate(15);
        return view('notifications.index');
    }

    public function showExamForm()
    {
        $programs = Program::all();
        return view('notifications.exam', compact('programs'));
    }

    public function sendExamNotification(Request $request)
    {
        // Retrieve the input values from the form
        $programId = $request->input('programId');
        $examDate = $request->input('exam_date');
        $content = $request->input('content');

        // Retrieve the program
        $program = Program::findOrFail($programId);

        // Send the notification to the applicants in the program
        $applicants = Applicant::where('program_id', $program->id)->get();

        foreach ($applicants as $applicant) {
            $applicant->notify(new ExamNotification($examDate, $content));
        }

        return redirect()->route('notifications.view');
    }

    public function showInterviewForm()
    {
        // $staffs = User::role('registrar_staff')->cursorPaginate(15);
        return view('notifications.interview');
    }
}
