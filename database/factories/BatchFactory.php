<?php

namespace Database\Factories;

use App\Models\Batch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Batch>
 */
class BatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'batch_num' => Batch::getNextBatchNumber(),
            'current_date' => \Carbon\Carbon::now()->format('Y-m-d'),
            'school_year_id' => 1
        ];
    }
}
