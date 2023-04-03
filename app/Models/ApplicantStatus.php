<?php

namespace App\Models;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplicantStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_status_name',
    ];

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}
