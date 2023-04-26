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

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public static function getNextBatchNumber()
    {
        $maxBatchNumber = self::max('batch_num') ?? 0;
        return $maxBatchNumber + 1;
    }
}
