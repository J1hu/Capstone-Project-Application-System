<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitialAssessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'remarks',
        'scholarship_type'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
