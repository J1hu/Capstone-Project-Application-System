<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'is_archived',
        'school_year_id'
    ];

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function batches()
    {
        return $this->hasMany(Batch::class);
    }
}
