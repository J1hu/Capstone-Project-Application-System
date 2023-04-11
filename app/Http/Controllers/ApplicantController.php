<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApplicantController extends Controller
{
    public function profile($id)
    {
        //
    }

    public function viewForm()
    {
        return view('applicants.form');
    }

    public function view(Request $request): View
    {
        return view('applicants.profile', [
            'user' => $request->user(),
        ]);
    }
}
