<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    const FULL_CAPACITY = 50;

    protected $fillable = [
        'batch_num',
        'is_archived'
    ];

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public static function getNextBatchNumber()
    {
        $lastBatch = Batch::where('is_archived', false)->latest()->first();
        if (!$lastBatch || $lastBatch->applicants()->count() >= self::FULL_CAPACITY) {
            return self::max('batch_num') + 1;
        }
        return $lastBatch->batch_num;
    }
}
