<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'remarks',
        'evaluation_type',
        'approval',
        'applicant_id'
    ];

    public function scholarshipType()
    {
        return $this->belongsTo(ScholarshipType::class);
    }

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
