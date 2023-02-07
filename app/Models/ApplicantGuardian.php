<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantGuardian extends Model
{
    use HasFactory;

    protected $fillable = [
        'guardian_fname',
        'guardian_mname',
        'guardian_lname',
        'guardian_religion',
        'guardian_occupation',
        'guardian_annual_income',
        'guardian_phone_num'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
