<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Program;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Notifications\SendNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function showNotification()
    {
        $programs = Program::all();
        return view('notifications.index', compact('programs'));
    }

    public function sendNotification(Request $request)
    {
        // Retrieve the input values from the form
        $programId = $request->input('programId');
        $title = $request->input('title');
        $content = $request->input('content');

        // Retrieve the program
        $program = Program::findOrFail($programId);

        // Send the notification to the applicants in the program
        $applicants = Applicant::where('program_id', $program->id)->get();

        foreach ($applicants as $applicant) {
            $applicant->notify(new SendNotification($title, $content));
        }

        return redirect()->route('notifications.view');
    }

    public function showInterviewForm()
    {
        return view('notifications.interview');
    }

    public function markAsRead($notificationId)
    {
        $applicant = Auth::user()->applicant;

        $notification = $applicant->unreadNotifications()
            ->where('id', $notificationId)
            ->first();

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->back();
    }
}
