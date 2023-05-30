<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'province_id', 'province_name', 'region_id', 'region_name'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function barangays()
    {
        return $this->hasMany(Barangay::class, 'municipality_id', 'id');
    }
}
