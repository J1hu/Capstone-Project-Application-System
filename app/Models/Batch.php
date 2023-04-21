<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_num',
        'is_archived'
    ];

    public function applicants()
    {
        return $this->belongsToMany(Applicant::class)->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->where('is_archived', false);
    }
}
