<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseOwnership extends Model
{
    use HasFactory;

    protected $fillable = [
        'ownership_type',
    ];
}
