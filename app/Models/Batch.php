<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_num'
    ];

    public function applicant()
    {
        return $this->hasMany(Applicant::class);
    }
}
