<?php

namespace App\Models;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_name'
    ];

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
