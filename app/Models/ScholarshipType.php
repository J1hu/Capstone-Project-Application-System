<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipType extends Model
{
    use HasFactory;

    protected $fillable = [
        'scholarship_name'
    ];

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluations::class);
    }
}
