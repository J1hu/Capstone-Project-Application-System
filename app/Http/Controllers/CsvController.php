<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Writer;
use Illuminate\Http\Response;
use App\Models\Batch;
use App\Models\Applicant;

class CsvController extends Controller
{
    private function generateCSV($filename, $data)
    {
        $csv = Writer::createFromString('');
        $csv->insertAll($data);

        $csvContent = $csv->getContent();
        
        return response($csvContent, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"'
        ]);
    }

    public function generateEvaluatedApplicantsCSV()
{
    // Fetch all data from DB
    $applicants = Applicant::where('applicant_status_id', 2)->get();

    // Initialize data array with header row
    $data = [['Name', 'Email', 'Applicant Type', 'Sex', 'Birthdate', 'Phone Number', 'Facebook Link', 'Religion', 'Avatar', 'Certificate', 'Total Family Children', 'Birth Order', 'Last School', 'Last School Address', 'School Type', 'LRN', 'ESC Grantee', 'ESC Number', 'Report Card', 'Program', 'Electric Bill Proof', 'Free Electric Bill Reason', 'Monthly Rental', 'Contact Consent', 'Data Privacy Consent', 'Batch ID', 'Exam Score ID', 'Application Status ID', 'Applicant Status ID']];

    // Loop through each applicant and add to data array
    foreach ($applicants as $applicant) {
        $data[] = [
            $applicant->getFullNameAttribute(),
            $applicant->user->email,
            $applicant->applicant_type,
            $applicant->sex,
            $applicant->birthdate,
            $applicant->phone_num,
            $applicant->fb_link,
            $applicant->religion,
            $applicant->avatar,
            $applicant->certificate,
            $applicant->total_fam_children,
            $applicant->birth_order,
            $applicant->last_school,
            $applicant->last_school_address,
            $applicant->school_type,
            $applicant->lrn,
            $applicant->esc_grantee,
            $applicant->esc_num,
            $applicant->report_card,
            $applicant->program->name,
            $applicant->ebill_proof,
            $applicant->free_ebill_reason,
            $applicant->monthly_rental,
            $applicant->contact_consent,
            $applicant->data_privacy_consent,
            $applicant->batch_id,
            $applicant->exam_score_id,
            $applicant->application_status_id,
            $applicant->applicant_status_id,
        ];
    }

    return $this->generateCSV('evaluated_applicants_list.csv', $data);
}

public function generatePendingApplicantsCSV()
{
    // Fetch all data from DB
    $applicants = Applicant::where('applicant_status_id', 1)->get();

    // Initialize data array with header row
    $data = [['Name', 'Email', 'Applicant Type', 'Sex', 'Birthdate', 'Phone Number', 'Facebook Link', 'Religion', 'Avatar', 'Certificate', 'Total Family Children', 'Birth Order', 'Last School', 'Last School Address', 'School Type', 'LRN', 'ESC Grantee', 'ESC Number', 'Report Card', 'Program', 'Electric Bill Proof', 'Free Electric Bill Reason', 'Monthly Rental', 'Contact Consent', 'Data Privacy Consent', 'Batch ID', 'Exam Score ID', 'Application Status ID', 'Applicant Status ID']];

    // Loop through each applicant and add to data array
    foreach ($applicants as $applicant) {
        $data[] = [
            $applicant->getFullNameAttribute(),
            $applicant->user->email,
            $applicant->applicant_type,
            $applicant->sex,
            $applicant->birthdate,
            $applicant->phone_num,
            $applicant->fb_link,
            $applicant->religion,
            $applicant->avatar,
            $applicant->certificate,
            $applicant->total_fam_children,
            $applicant->birth_order,
            $applicant->last_school,
            $applicant->last_school_address,
            $applicant->school_type,
            $applicant->lrn,
            $applicant->esc_grantee,
            $applicant->esc_num,
            $applicant->report_card,
            $applicant->program->name,
            $applicant->ebill_proof,
            $applicant->free_ebill_reason,
            $applicant->monthly_rental,
            $applicant->contact_consent,
            $applicant->data_privacy_consent,
            $applicant->batch_id,
            $applicant->exam_score_id,
            $applicant->application_status_id,
            $applicant->applicant_status_id,
        ];
    }

    return $this->generateCSV('pending_applicants_list.csv', $data);
}

// public function generateBatchCSV()
// {
//     // Fetch all data from DB
//     $applicants = Applicant::where('applicant_status_id', 1)->get();

//     // Initialize data array with header row
//     $data = [['Name', 'Email', 'Applicant Type', 'Sex', 'Birthdate', 'Phone Number', 'Facebook Link', 'Religion', 'Avatar', 'Certificate', 'Total Family Children', 'Birth Order', 'Last School', 'Last School Address', 'School Type', 'LRN', 'ESC Grantee', 'ESC Number', 'Report Card', 'Program', 'Electric Bill Proof', 'Free Electric Bill Reason', 'Monthly Rental', 'Contact Consent', 'Data Privacy Consent', 'Batch ID', 'Exam Score ID', 'Application Status ID', 'Applicant Status ID']];

//     // Loop through each applicant and add to data array
//     foreach ($applicants as $applicant) {
//         $data[] = [
//             $applicant->getFullNameAttribute(),
//             $applicant->user->email,
//             $applicant->applicant_type,
//             $applicant->sex,
//             $applicant->birthdate,
//             $applicant->phone_num,
//             $applicant->fb_link,
//             $applicant->religion,
//             $applicant->avatar,
//             $applicant->certificate,
//             $applicant->total_fam_children,
//             $applicant->birth_order,
//             $applicant->last_school,
//             $applicant->last_school_address,
//             $applicant->school_type,
//             $applicant->lrn,
//             $applicant->esc_grantee,
//             $applicant->esc_num,
//             $applicant->report_card,
//             $applicant->program->name,
//             $applicant->ebill_proof,
//             $applicant->free_ebill_reason,
//             $applicant->monthly_rental,
//             $applicant->contact_consent,
//             $applicant->data_privacy_consent,
//             $applicant->batch_id,
//             $applicant->exam_score_id,
//             $applicant->application_status_id,
//             $applicant->applicant_status_id,
//         ];
//     }

//     return $this->generateCSV('pending_applicants_list.csv', $data);
// }

}
