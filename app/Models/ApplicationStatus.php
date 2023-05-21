<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_status_name'
    ];

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}
