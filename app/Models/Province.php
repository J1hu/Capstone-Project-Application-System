<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'region_id', 'region_name'
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function municipalities()
    {
        return $this->hasMany(Municipality::class, 'province_id', 'id');
    }
}
