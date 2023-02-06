<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectricBills extends Model
{
    use HasFactory;

    protected $fillable = [
        'electric_month',
        'electric_amount'
    ];
}
