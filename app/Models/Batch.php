<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_num',
        'program_id',
        'school_year_id'
    ];

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public static function getNextBatchNumber()
    {
        $lastBatch = Batch::latest('batch_num')->first();
        if (!$lastBatch) {
            return 1;
        }
        return $lastBatch->batch_num + 1;
    }
}
