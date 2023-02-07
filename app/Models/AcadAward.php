<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcadAward extends Model
{
    use HasFactory;

    protected $fillable = [
        'award_name',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
