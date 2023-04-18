<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\ApplicantAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApplicantController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('applicants.dashboard', compact('user'));
    }

    public function viewForm()
    {
        $programs = Program::all();
        return view('applicants.forms.form', ['programs' => $programs]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'applicant_type' => 'required',
            'sex' => 'required',
            'birthdate' => 'required|date',
            'phone_num' => 'required',
            'fb_link' => 'required',
            'religion' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'total_fam_children' => 'required|integer',
            'birth_order' => 'required',
            'last_school' => 'required',
            'last_school_address' => 'required',
            'school_type' => 'required',
            'lrn' => 'required',
            'esc_grantee' => 'required',
            'esc_num' => 'required',
            'program_id' => 'required',
            'free_ebill_reason' => 'required',
            'monthly_rental' => 'required',
            'data_privacy_consent' => 'required',
            'date_accomplished' => 'required',
            'province' => 'required|string|max:255',
            'city_municipality' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
        ]);

        if ($validator->fails()) {
            return redirect('applicant/create')
                ->withErrors($validator)
                ->withInput();
        }

        $applicant = new Applicant();
        $applicant->fname = $request->input('fname');
        $applicant->mname = $request->input('mname');
        $applicant->lname = $request->input('lname');
        $applicant->applicant_type = $request->input('applicant_type');
        $applicant->sex = $request->input('sex');
        $applicant->birthdate = $request->input('birthdate');
        $applicant->phone_num = $request->input('phone_num');
        $applicant->fb_link = $request->input('fb_link');
        $applicant->religion = $request->input('religion');
        $applicant->total_fam_children = $request->input('total_fam_children');
        $applicant->birth_order = $request->input('birth_order');
        $applicant->last_school = $request->input('last_school');
        $applicant->last_school_address = $request->input('last_school_address');
        $applicant->school_type = $request->input('school_type');
        $applicant->lrn = $request->input('lrn');
        $applicant->esc_grantee = $request->input('esc_grantee');
        $applicant->esc_num = $request->input('esc_num');
        $applicant->program_id = $request->input('program_id');
        $applicant->free_ebill_reason = $request->input('free_ebill_reason');
        $applicant->monthly_rental = $request->input('monthly_rental');
        $applicant->data_privacy_consent = $request->input('data_privacy_consent');
        $applicant->date_accomplished = $request->input('date_accomplished');

        $applicant->user_id = Auth::id();

        $filename = time() . '.' . request()->avatar->getClientOriginalExtension();
        request()->avatar->move(public_path('avatars'), $filename);

        $address = new ApplicantAddress();
        $address->province = $request->input('province');
        $address->city_municipality = $request->input('city_municipality');
        $address->barangay = $request->input('barangay');
        $address->zip_code = $request->input('zip_code');


        $applicant->avatar = $filename;

        $applicant->address()->save($address);
        $applicant->save();

        return redirect()->route('applicants.dashboard');
    }

    public function viewProfile()
    {
        $user = Auth::user();
        $applicant = $user->applicant;

        return view('applicants.profile', compact('user', 'applicant'));
    }
}
