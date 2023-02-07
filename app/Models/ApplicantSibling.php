<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantSibling extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'education_level'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
