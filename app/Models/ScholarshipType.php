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

    public function evaluations()
    {
        return $this->belongsTo(Evaluations::class);
    }
}
