<?php

namespace Database\Factories;

use App\Models\Batch;
use App\Models\Gadget;
use Random\RandomError;
use App\Models\AcadAward;
use App\Models\Applicant;
use App\Models\ExamScore;
use App\Models\ElectricBill;
use App\Models\InternetType;
use App\Models\HouseOwnership;
use App\Models\ApplicantFather;
use App\Models\ApplicantMother;
use App\Models\ScholarshipType;
use App\Models\ApplicantAddress;
use App\Models\ApplicantSibling;
use App\Models\ApplicantGuardian;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'user_id' => rand(1, 50),
            'fname' => fake()->firstName(),
            'mname' => fake()->text(5),
            'lname' => fake()->lastName(),
            'applicant_type' => fake()->randomElement(['Old Student', 'New Student', 'Old Returnee']),
            'sex' => fake()->randomElement(['Male', 'Female']),
            'birthdate' => fake()->date(),
            'phone_num' => fake()->phoneNumber(),
            'fb_link' => fake()->text(10),
            'religion' => fake()->text(10),
            'avatar' => fake()->text(5),
            'certificate' => fake()->text(5),
            'total_fam_children' => fake()->randomNumber(),
            'birth_order' => fake()->text(5),
            'last_school' => fake()->text(10),
            'last_school_address' => fake()->text(10),
            'school_type' => fake()->randomElement(['Public', 'Private', 'State University']),
            'lrn' => fake()->text(10),
            'esc_grantee' => fake()->randomElement(['Yes', 'No', 'N/A']),
            'esc_num' => fake()->text(10),
            'report_card' => fake()->text(5),
            'program_id' => rand(1, 6),
            'ebill_proof' => fake()->text(5),
            'free_ebill_reason' => fake()->text(40),
            'monthly_rental' => fake()->randomElement([1000, 900, 12324, 3423.53, 23144.42]),
            'contact_consent' => fake()->boolean(100),
            'document_consent' => fake()->boolean(100),
            'data_privacy_consent' => fake()->boolean(100),
            'batch_id' => 1,
            'application_status_id' => rand(1, 4),
            'applicant_status_id' => rand(1, 2),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Applicant $applicant) {
            // Remove any existing roles from the user
            $applicant->user->roles()->detach();

            // Assign a single role to the user
            $role = Role::where('name', 'applicant')->first();
            $applicant->user->assignRole($role);
            // Create an applicant address and associate it with the applicant
            ApplicantAddress::factory()->create([
                'applicant_id' => $applicant->id,
            ]);
            AcadAward::factory()->create([
                'applicant_id' => $applicant->id,
            ]);
            ApplicantFather::factory()->create([
                'applicant_id' => $applicant->id,
            ]);
            ApplicantMother::factory()->create([
                'applicant_id' => $applicant->id,
            ]);
            ApplicantGuardian::factory()->create([
                'applicant_id' => $applicant->id,
            ]);
            ApplicantSibling::factory()->create([
                'applicant_id' => $applicant->id,
            ]);
            ApplicantSibling::factory()->create([
                'applicant_id' => $applicant->id,
            ]);
            ElectricBill::factory()->create([
                'applicant_id' => $applicant->id,
            ]);
            Gadget::factory()->create([
                'applicant_id' => $applicant->id,
            ]);
            HouseOwnership::factory()->create([
                'applicant_id' => $applicant->id,
            ]);
            InternetType::factory()->create([
                'applicant_id' => $applicant->id,
            ]);
        });
    }
}
