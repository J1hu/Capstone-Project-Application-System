<?php

namespace App\Http\Controllers;

use App\Models\Gadget;
use App\Models\Program;
use App\Models\AcadAward;
use App\Models\Applicant;
use App\Models\ElectricBill;
use App\Models\InternetType;
use Illuminate\Http\Request;
use App\Models\HouseOwnership;
use App\Models\ApplicantFather;
use App\Models\ApplicantMother;
use App\Events\ApplicantCreated;
use App\Models\ApplicantAddress;
use App\Models\ApplicantGuardian;
use App\Models\ApplicationStatus;
use App\Models\Barangay;
use App\Models\Municipality;
use App\Models\Province;
use App\Models\Region;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Check if the user has applicant data
        if ($user->applicant) {
            return view('applicants.dashboard', compact('user'));
        } else if ($user->hasAnyRole(['admin', 'mancom', 'registrar_staff', 'program_head'])) {
            return redirect()->route('dashboard');
        }

        // Redirect to application form
        return redirect()->route('applicants.forms.form');
    }

    public function viewForm()
    {
        $user = Auth::user();
        if ($user->applicant()->exists()) {
            return redirect()->route('applicants.dashboard');
        }

        $gadgets = Gadget::all();
        $internets = InternetType::all();
        $ownership_types = HouseOwnership::all();
        $programs = Program::all();

        return view(
            'applicants.forms.form',
            [
                'programs' => $programs,
                'gadgets' => $gadgets,
                'internets' => $internets,
                'ownership_types' => $ownership_types,

            ],
            compact('user')
        );
    }

    public function store(Request $request)
    {
        $applicant = new Applicant();
        $applicant->contact_consent = $request->input('contact_consent');
        $applicant->document_consent = $request->input('document_consent');
        $applicant->fname = $request->input('fname');
        $applicant->mname = $request->input('mname');
        $applicant->lname = $request->input('lname');
        $applicant->applicant_type = $request->input('applicant_type');
        $applicant->sex = $request->input('sex');
        $applicant->birthdate = $request->input('birthdate');
        $applicant->phone_num = $request->input('phone_num');
        $applicant->fb_link = $request->input('fb_link');
        $applicant->religion = $request->input('religion');

        // family data
        $applicant->total_fam_children = $request->input('total_fam_children');
        $applicant->birth_order = $request->input('birth_order');

        // educational background
        $applicant->last_school = $request->input('last_school');
        $applicant->last_school_address = $request->input('last_school_address');
        $applicant->school_type = $request->input('school_type');
        $applicant->lrn = $request->input('lrn');
        $applicant->esc_grantee = $request->input('esc_grantee');
        $applicant->esc_num = $request->input('esc_num');

        //program choice
        $applicant->program_id = $request->input('program_id');

        // other information
        $applicant->free_ebill_reason = $request->input('free_ebill_reason');
        $applicant->monthly_rental = $request->input('monthly_rental');
        $applicant->data_privacy_consent = $request->input('data_privacy_consent');
        $applicant->applicant_status_id = 1;

        $applicant->user_id = Auth::id();

        // saving applicant avatar
        $filename = time() . '.' . request()->avatar->getClientOriginalExtension();
        request()->avatar->move(storage_path('app/public/avatars'), $filename);
        $applicant->avatar = $filename;

        // saving certificates of applicants
        $cert = time() . '.' . request()->certificate->getClientOriginalExtension();
        $request->certificate->move(storage_path('app/public/certificates'), $cert);
        $applicant->certificate = $cert;

        //report card
        $reportCard = time() . '.' . request()->report_card->getClientOriginalExtension();
        $request->report_card->move(storage_path('app/public/report-cards'), $reportCard);
        $applicant->report_card = $reportCard;

        //ebill proof
        $ebill = time() . '.' . request()->ebill_proof->getClientOriginalExtension();
        $request->ebill_proof->move(storage_path('app/public/ebill-proofs'), $ebill);
        $applicant->ebill_proof = $ebill;

        $applicant->save();

        $applicantId = $applicant->id;

        $address = new ApplicantAddress();
        $address->region = $request->input('region');
        $address->province = $request->input('province');
        $address->city_municipality = $request->input('city_municipality');
        $address->barangay = $request->input('barangay');
        $address->street = $request->input('street');
        $address->zip_code = $request->input('zip_code');
        $address->applicant_id = $applicantId;

        $applicant->address()->save($address);

        $siblings = [];
        $siblingNames = $request->input('full_name');
        $siblingEducationLevels = $request->input('education_level');

        // Loop through the arrays and create siblings
        foreach ($siblingNames as $index => $name) {
            $siblings[] = [
                'full_name' => $name,
                'education_level' => $siblingEducationLevels[$index],
                'applicant_id' => $applicantId
            ];
        }
        $applicant->siblings()->createMany($siblings);

        $mother = new ApplicantMother();
        $mother->mother_fname = $request->input('mother_fname');
        $mother->mother_mname = $request->input('mother_mname');
        $mother->mother_lname = $request->input('mother_lname');
        $mother->mother_religion = $request->input('mother_religion');
        $mother->mother_occupation = $request->input('mother_occupation');
        $mother->mother_annual_income = $request->input('mother_annual_income');
        $mother->mother_phone_num = $request->input('mother_phone_num');
        $mother->applicant_id = $applicantId;

        $applicant->mother()->save($mother);


        $father = new ApplicantFather();
        $father->father_fname = $request->input('father_fname');
        $father->father_mname = $request->input('father_mname');
        $father->father_lname = $request->input('father_lname');
        $father->father_religion = $request->input('father_religion');
        $father->father_occupation = $request->input('father_occupation');
        $father->father_annual_income = $request->input('father_annual_income');
        $father->father_phone_num = $request->input('father_phone_num');
        $father->applicant_id = $applicantId;

        $applicant->father()->save($father);

        $guardian = new ApplicantGuardian();
        $guardian->guardian_fname = $request->input('guardian_fname');
        $guardian->guardian_mname = $request->input('guardian_mname');
        $guardian->guardian_lname = $request->input('guardian_lname');
        $guardian->guardian_religion = $request->input('guardian_religion');
        $guardian->guardian_occupation = $request->input('guardian_occupation');
        $guardian->guardian_annual_income = $request->input('guardian_annual_income');
        $guardian->guardian_phone_num = $request->input('guardian_phone_num');
        $guardian->applicant_id = $applicantId;

        $applicant->guardian()->save($guardian);

        $acadAwards = $request->input('award_name');
        // dd($acadAwards);

        foreach ($acadAwards as $award) {
            $acadAward = new AcadAward([
                'award_name' => $award,
                'applicant_id' => $applicantId
            ]);

            $applicant->acadAwards()->save($acadAward);
        }

        //other information

        //gadgets
        $gadgetNames = $request->input('gadget_name');
        $gadgets = [];
        foreach ($gadgetNames as $gadgetName) {
            $gadgets[] = [
                'gadget_name' => $gadgetName,
                'applicant_id' => $applicantId
            ];
        }

        Gadget::insert($gadgets);


        // internet type
        $internetNames = $request->input('internet_name');
        $internetTypes = [];

        foreach ($internetNames as $internetName) {
            $internetTypes[] = [
                'internet_name' => $internetName,
                'applicant_id' => $applicantId
            ];
        }

        InternetType::insert($internetTypes);

        //electric bills of last three months
        $electricBills = $request->input('electric_bills');

        $electricBillData = [];
        foreach ($electricBills as $electricBill) {
            $electricBillData[] = [
                'electric_month' => $electricBill['electric_month'],
                'electric_amount' => $electricBill['electric_amount'],
                'applicant_id' => $applicantId
            ];
        }

        ElectricBill::insert($electricBillData);

        $houseOwnership = $applicant->houseOwnership()->create([
            'ownership_type' => $request->input('ownership_type')
        ]);

        $houseOwnership->applicant_id = $applicantId;
        $houseOwnership->save();


        //assign batch to applicant
        event(new ApplicantCreated($applicant));

        //assign status to applicant
        $applicationStatus = ApplicationStatus::where('application_status_name', 'filled')->first();
        $applicant->application_status()->associate($applicationStatus);
        $applicant->save();



        return redirect()->route('applicants.dashboard');
    }

    public function viewProfile()
    {
        $user = Auth::user();
        $applicant = $user->applicant;

        return view('applicants.profile', compact('user', 'applicant'));
    }

    public function edit($id)
    {
        $applicant = Applicant::findOrFail($id);
        $user = $applicant->user;
        $programs = Program::all();

        return view('applicants.edit', compact('user', 'applicant', 'programs'));
    }

    public function update(Request $request, $id)
    {
        $applicant = Applicant::findOrFail($id);

        $applicant->fill($request->only([
            'fname',
            'mname',
            'lname',
            'applicant_type',
            'sex',
            'birthdate',
            'phone_num',
            'fb_link',
            'religion',
            'total_fam_children',
            'birth_order',
            'last_school',
            'last_school_address',
            'school_type',
            'lrn',
            'esc_grantee',
            'esc_num',
            'program_id',
            'free_ebill_reason',
            'monthly_rental',
            'contact_consent',
            'data_privacy_consent',
            'batch_id',
            'exam_score_id',
            'application_status_id',
            'applicant_status_id',
        ]));

        // Update applicant avatar if a new one is provided
        if ($request->hasFile('avatar')) {
            // Delete the existing avatar file
            $previousAvatar = $applicant->avatar;

            $filename = time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('avatars'), $filename);

            if ($previousAvatar) {
                $filepath = public_path('avatars/' . $previousAvatar);

                if (file_exists($filepath)) {
                    chmod($filepath, 0777);
                    unlink($filepath);
                }
            }
            $applicant->avatar = $filename;
        }

        // Update certificates if new ones are provided
        if ($request->hasFile('certificate')) {
            // Delete the existing certificate file
            $previousCertificate = $applicant->certificate;

            $cert = time() . '.' . $request->certificate->getClientOriginalExtension();
            $request->file('certificate')->move(storage_path('certificates'), $cert);

            if ($previousCertificate) {
                $filepath = storage_path('certificates/' . $previousCertificate);

                if (file_exists($filepath)) {
                    chmod($filepath, 0777);
                    unlink($filepath);
                }
            }
            $applicant->certificate = $cert;
        }

        // Update report card if a new one is provided
        if ($request->hasFile('report_card')) {
            // Delete the existing report card file
            $previousReportCard = $applicant->report_card;

            $reportCard = time() . '.' . $request->report_card->getClientOriginalExtension();
            $request->file('report_card')->move(storage_path('report-cards'), $reportCard);

            if ($previousReportCard) {
                $filepath = storage_path('report-cards/' . $previousReportCard);

                if (file_exists($filepath)) {
                    chmod($filepath, 0777);
                    unlink($filepath);
                }
            }
            $applicant->report_card = $reportCard;
        }

        // Update ebill proof if a new one is provided
        if ($request->hasFile('ebill_proof')) {
            // Delete the existing ebill proof file
            $previousEbillProof = $applicant->ebill_proof;

            $ebill = time() . '.' . $request->ebill_proof->getClientOriginalExtension();
            $request->file('ebill_proof')->move(storage_path('ebill-proofs'), $ebill);

            if ($previousEbillProof) {
                $filepath = storage_path('ebill-proofs/' . $previousEbillProof);

                if (file_exists($filepath)) {
                    chmod($filepath, 0777);
                    unlink($filepath);
                }
            }
            $applicant->ebill_proof = $ebill;
        }

        $applicant->save();

        return redirect()->route('applicants.admin-view', $id);
    }

    public function viewProfileById($id)
    {
        $applicant = Applicant::findOrFail($id);
        $user = $applicant->user;

        $application_status = ApplicationStatus::all();

        $preassessment = $applicant->preassessment;
        $exam_score = $applicant->examScore;
        $initial_assessment = $applicant->initialAssessment;
        $final_assessment = $applicant->finalAssessment;

        return view('admin.applicant-profile', compact('user', 'applicant', 'preassessment', 'exam_score', 'initial_assessment', 'final_assessment', 'application_status'));
    }

    public function notifications()
    {
        // Get the authenticated user's applicant model
        $applicant = Auth::user()->applicant;

        // Retrieve the notifications associated with the applicant
        $notifications = $applicant->notifications;

        // Return the notifications to the view
        return view('applicants.notifications', compact('notifications'));
    }


    public function address()
    {
        $regions = Region::all();

        // dd($regions);

        $provinces = Province::all();
        $municipality = Municipality::all();
        $barangay = Barangay::all();

        return view('applicants.forms.address', compact('regions', 'provinces', 'municipality', 'barangay'));
    }
}
