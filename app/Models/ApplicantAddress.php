<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'province',
        'city_municipality',
        'barangay',
        'street',
        'zip_code'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
