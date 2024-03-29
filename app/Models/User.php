<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Program;
use App\Models\Applicant;
use App\Models\Evaluation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'program_id',
        'email',
        'password',
        'email_verified_at',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // public function role()
    // {
    //     return $this->belongsTo(Role::class);
    // }

    public function applicant()
    {
        return $this->hasOne(Applicant::class);
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
