<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'region',
        'province',
        'city_municipality',
        'barangay',
        'street',
        'zip_code',
        'applicant_id'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
