<?php

namespace App\Models;

use App\Models\SchoolYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    // public static function getNextBatchNumber()
    // {
    //     $schoolYear = SchoolYear::where('is_archived', 0)->latest()->first();
    //     $lastBatch = $schoolYear->batches()->latest('batch_num')->first();

    //     if (!$lastBatch) {
    //         $newBatch = Batch::create(['batch_num' => 1]);
    //         return $newBatch->batch_num;
    //     }

    //     return $lastBatch->batch_num + 1;
    // }

    public static function getNextBatchNumber()
    {
        $schoolYear = SchoolYear::where('is_archived', 0)->latest()->first();
        $lastBatch = $schoolYear->batches()->latest('batch_num')->first();

        if (!$lastBatch) {
            return 1;
        }

        return $lastBatch->batch_num + 1;
    }
}
