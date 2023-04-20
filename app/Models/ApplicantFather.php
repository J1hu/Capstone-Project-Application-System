<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantFather extends Model
{
    use HasFactory;

    protected $fillable = [
        'father_fname',
        'father_mname',
        'father_lname',
        'father_religion',
        'father_occupation',
        'father_annual_income',
        'father_phone_num',
        'applicant_id'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
