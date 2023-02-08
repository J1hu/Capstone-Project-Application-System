<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternetType extends Model
{
    use HasFactory;

    protected $fillable = [
        'internet_name'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
