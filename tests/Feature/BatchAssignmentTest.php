<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Batch;
use App\Models\Applicant;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BatchAssignmentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testApplicantsAreAutoAssignedToBatches()
    {
        // Create 100 applicants
        for ($i = 0; $i < 100; $i++) {
            $applicantData = Applicant::factory()->make()->toArray();
            $response = $this->post('/applicants', $applicantData);

            // Check if the response is successful
            $response->assertStatus(302);

            // Check if the applicant is assigned to a batch
            $applicant = Applicant::find(1); // get the latest applicant
            $this->assertNotNull($applicant->batch_id);
        }

        // Check if there are 3 batches in total
        $this->assertEquals(3, Batch::count());
    }
}
