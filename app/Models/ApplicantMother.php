<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantMother extends Model
{
    use HasFactory;

    protected $fillable = [
        'mother_fname',
        'mother_mname',
        'mother_lname',
        'mother_religion',
        'mother_occupation',
        'mother_annual_income',
        'mother_phone_num',
        'applicant_id'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
