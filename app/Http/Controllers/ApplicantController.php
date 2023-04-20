<?php

namespace App\Http\Controllers;

use App\Models\Gadget;
use App\Models\Program;
use App\Models\AcadAward;
use App\Models\Applicant;
use App\Models\ElectricBill;
use App\Models\InternetType;
use Illuminate\Http\Request;
use App\Models\ApplicantFather;
use App\Models\ApplicantMother;
use App\Models\ApplicantAddress;
use App\Models\ApplicantSibling;
use App\Models\ApplicantGuardian;
use App\Models\HouseOwnership;
use Illuminate\Support\Facades\Auth;
use Database\Seeders\ApplicantSeeder;
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
            // 'esc_grantee' => 'required',
            // 'esc_num' => 'required',
            'program_id' => 'required',
            'free_ebill_reason' => 'required',
            'monthly_rental' => 'required',
            'data_privacy_consent' => 'required',
            'document_consent' => 'required',
            'date_accomplished' => 'required',
            'province' => 'required|string|max:255',
            'city_municipality' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
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
        $applicant->document_consent = $request->input('document_consent');
        $applicant->date_accomplished = $request->input('date_accomplished');

        $applicant->user_id = Auth::id();

        // saving applicant avatar
        $filename = time() . '.' . request()->avatar->getClientOriginalExtension();
        request()->avatar->move(public_path('avatars'), $filename);
        $applicant->avatar = $filename;

        // saving certificates of applicants
        $cert = time() . '.' . request()->certificate->getClientOriginalExtension();
        $request->certificate->storeAs('certificates', $cert, 'private');
        $applicant->certificate = $cert;

        //report card
        $reportCard = time() . '.' . request()->report_card->getClientOriginalExtension();
        $request->report_card->storeAs('report-cards', $reportCard, 'private');
        $applicant->report_card = $reportCard;

        //ebill proof
        $ebill = time() . '.' . request()->avatar->getClientOriginalExtension();
        $request->ebill_proof->storeAs('ebill-proofs', $ebill, 'private');
        $applicant->ebill_proof = $ebill;

        $applicant->save();

        $applicantId = $applicant->id;

        $address = new ApplicantAddress();
        $address->province = $request->input('province');
        $address->city_municipality = $request->input('city_municipality');
        $address->barangay = $request->input('barangay');
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

        // Save the siblings to the database
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

        //academic awards of applicant
        $acadAwards = $request->input('award_name');
        foreach ($acadAwards as $award) {
            $acadAward = new AcadAward();
            $acadAward->award_name = $award;
            $acadAward->applicant_id = $applicantId;

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
                'applicant_id' => $electricBill['applicant_id']
            ];
        }

        ElectricBill::insert($electricBillData);

        //ownershipType
        $houseOwnership = new HouseOwnership();
        $houseOwnership->ownership_type = $request->input('ownership_type');
        $houseOwnership->applicant_id = $applicantId;

        $applicant->houseOwnership()->save($houseOwnership);

        return redirect()->route('applicants.dashboard');
    }

    public function viewProfile()
    {
        $user = Auth::user();
        $applicant = $user->applicant;

        return view('applicants.profile', compact('user', 'applicant'));
    }
}
