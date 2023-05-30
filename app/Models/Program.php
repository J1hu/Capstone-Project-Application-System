<?php

namespace App\Models;

use App\Models\User;
use App\Models\Applicant;
use App\Models\Batch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_name'
    ];

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    // specific users with specific programs
    public function getUsersByProgram($programName)
    {
        return $this->with('users')->where('program_name', $programName)->firstOrFail()->users;
    }

    public function getBSIS()
    {
        $programName = 'BSIS';
        $program = Program::where('program_name', $programName)->first();
        $users = $program->getUsersByProgram($programName);

        return $users;
    }

    public function batches()
    {
        return $this->hasMany(Batch::class);
    }

    public static function getBSISApplicants()
    {
        $program = self::where('program_name', 'BSIS')->first();

        if ($program) {
            return $program->applicants()->count();
        }

        return 0;
    }

    public static function getACTApplicants()
    {
        $program = self::where('program_name', 'ACT')->first();

        if ($program) {
            return $program->applicants()->count();
        }

        return 0;
    }

    public static function getBABApplicants()
    {
        $program = self::where('program_name', 'BAB')->first();

        if ($program) {
            return $program->applicants()->count();
        }

        return 0;
    }

    public static function getBSAApplicants()
    {
        $program = self::where('program_name', 'BSA')->first();

        if ($program) {
            return $program->applicants()->count();
        }

        return 0;
    }

    public static function getBSAISApplicants()
    {
        $program = self::where('program_name', 'BSAIS')->first();

        if ($program) {
            return $program->applicants()->count();
        }

        return 0;
    }

    public static function getBSSWApplicants()
    {
        $program = self::where('program_name', 'BSSW')->first();

        if ($program) {
            return $program->applicants()->count();
        }

        return 0;
    }
}
