<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preassessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'applicant_id',
        'is_approved',
        'remarks'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
