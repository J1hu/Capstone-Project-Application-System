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
use Illuminate\Validation\Rule;
use App\Events\ApplicantCreated;
use App\Models\ApplicantAddress;
use App\Models\ApplicantSibling;
use App\Models\ApplicantGuardian;
use App\Models\Preassessment;
use Illuminate\Support\Facades\Auth;
use Database\Seeders\ApplicantSeeder;
use Illuminate\Support\Facades\Validator;

class ApplicantController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Check if the user has applicant data
        if ($user->applicant) {
            return view('applicants.dashboard', compact('user'));
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

        $programs = Program::all();
        return view('applicants.forms.form', ['programs' => $programs]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contact_consent' => 'required',
            'document_consent' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'applicant_type' => 'required',
            'sex' => 'required',
            'birthdate' => 'required|date',
            'phone_num' => 'required',
            'fb_link' => 'required',
            'religion' => 'required',
            //home address
            'province' => 'required',
            'city_municipality' => 'required',
            'barangay' => 'required',
            'street' => 'required',
            'zip_code' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'total_fam_children' => 'required|integer',
            'birth_order' => 'required',
            //sibling
            'full_name.*' => 'required|string|max:255',
            'education_level.*' => 'required|string|max:255',
            //mother
            'mother_fname' => 'required|max:255',
            'mother_religion' => 'required|max:255',
            'mother_mname' => 'required|max:255',
            'mother_occupation' => 'required|max:255',
            'mother_lname' => 'required|max:255',
            'mother_annual_income' => 'required|in:250,000PHP and less,250,000PHP to 400,000PHP,400,000PHP to 800,000PHP,800,000PHP to 2,000,000PHP,2,000,000PHP to 8,000,000PHP',
            'mother_phone_num' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            //father
            'father_fname' => 'required|max:255',
            'father_religion' => 'required|max:255',
            'father_mname' => 'required|max:255',
            'father_occupation' => 'required|max:255',
            'father_lname' => 'required|max:255',
            'father_annual_income' => 'required|in:250,000PHP and less,250,000PHP to 400,000PHP,400,000PHP to 800,000PHP,800,000PHP to 2,000,000PHP,2,000,000PHP to 8,000,000PHP',
            'father_phone_num' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            //guardian
            'guardian_fname' => 'required|max:255',
            'guardian_religion' => 'required|max:255',
            'guardian_mname' => 'required|max:255',
            'guardian_occupation' => 'required|max:255',
            'guardian_lname' => 'required|max:255',
            'guardian_annual_income' => 'required|in:250,000PHP and less,250,000PHP to 400,000PHP,400,000PHP to 800,000PHP,800,000PHP to 2,000,000PHP,2,000,000PHP to 8,000,000PHP',
            'guardian_phone_num' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            //cert
            'certificate' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //last school
            'last_school' => 'required|string|max:255',
            'school_type' => 'required|in:Public,Private,State University',
            'last_school_address' => 'required|string|max:255',
            // award
            'award_name' => 'required|array|min:1',
            //
            'lrn' => 'required',
            'esc_grantee' => 'string',
            'esc_num' => 'string',
            //report card
            'report_card' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //chosen program
            'program_id' => 'required',
            //gadgets
            'gadget_name' => ['required', 'array', 'min:1', Rule::in(['smartphone', 'tablet', 'laptop', 'desktop'])],
            //internet
            'internet_name' => 'required|array|min:1',
            'internet_name.*' => 'string|in:postpaid,prepaid,prepaid_wifi,broadband',
            //electric
            'electric_month_1' => 'required|in:january,february,march,april,may,june,july,august,september,october,november,december',
            'electric_amount_1' => 'required|numeric|min:0',
            'electric_month_2' => 'required|in:january,february,march,april,may,june,july,august,september,october,november,december',
            'electric_amount_2' => 'required|numeric|min:0',
            'electric_month_3' => 'required|in:january,february,march,april,may,june,july,august,september,october,november,december',
            'electric_amount_3' => 'required|numeric|min:0',
            // ebill proof
            'ebill_proof' => 'required|mimes:jpeg,jpg,png|max:2048',
            'ebill_proof.required' => 'Please upload a picture of the electric bills for the last three months',
            'ebill_proof.mimes' => 'The picture must be in jpeg, jpg or png format',
            'ebill_proof.max' => 'The picture must not be larger than 2MB',
            'free_ebill_reason' => 'required',
            // ownership
            'ownership_type' => ['required', 'string', Rule::in(['Owned, Fully Paid', 'Owned, Amortized', 'Rented', 'Free/Living with relatives/Inherited'])],
            'monthly_rental' => 'required|numeric|min:0',
            // section 7
            'data_privacy_consent' => 'required',
        ]);

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
        request()->avatar->move(public_path('avatars'), $filename);
        $applicant->avatar = $filename;

        // saving certificates of applicants
        $cert = time() . '.' . request()->certificate->getClientOriginalExtension();
        $request->certificate->move(storage_path('certificates'), $cert);
        $applicant->certificate = $cert;

        //report card
        $reportCard = time() . '.' . request()->report_card->getClientOriginalExtension();
        $request->report_card->move(storage_path('report-cards'), $reportCard);
        $applicant->report_card = $reportCard;

        //ebill proof
        $ebill = time() . '.' . request()->ebill_proof->getClientOriginalExtension();
        $request->ebill_proof->move(storage_path('ebill-proofs'), $ebill);
        $applicant->ebill_proof = $ebill;

        $applicant->save();

        $applicantId = $applicant->id;

        $address = new ApplicantAddress();
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

        //ownershipType
        $houseOwnership = new HouseOwnership();
        $houseOwnership->ownership_type = $request->input('ownership_type');
        $houseOwnership->applicant_id = $applicantId;

        $applicant->houseOwnership()->save($houseOwnership);

        event(new ApplicantCreated($applicant));

        return redirect()->route('applicants.dashboard');
    }

    public function viewProfile()
    {
        $user = Auth::user();
        $applicant = $user->applicant;

        return view('applicants.profile', compact('user', 'applicant'));
    }

    public function edit()
    {
        $user = Auth::user();
        $applicant = $user->applicant;
        $programs = Program::all();

        return view('applicants.edit', compact('user', 'applicant', 'programs'));
    }

    public function update()
    {
    }

    public function viewProfileById($id)
    {
        $applicant = Applicant::findOrFail($id);
        $user = $applicant->user;

        $preassessment = $applicant->preassessment;
        $exam_score = $applicant->examScore;
        $initial_assessment = $applicant->initialAssessment;
        $final_assessment = $applicant->finalAssessment;
        // dd($initial_assessment);

        return view('admin.applicant-profile', compact('user', 'applicant', 'preassessment', 'exam_score', 'initial_assessment', 'final_assessment'));
    }

    public function notifications()
    {
        $notifications = Auth::user()->applicant->notifications;

        return view('applicants.notifications', compact('notifications'));
    }
}
