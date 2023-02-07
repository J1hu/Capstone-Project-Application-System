<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamScores extends Model
{
    use HasFactory;

    protected $fillable = [
        'intelligence_score',
        'aptitude_score',
        'average_score'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
