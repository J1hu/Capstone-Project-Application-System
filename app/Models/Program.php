<?php

namespace App\Models;

use App\Models\User;
use App\Models\Applicant;
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
}
