<?php

namespace App\Models;

use App\Models\Program;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        // personal information
        'fname',
        'mname',
        'lname',
        'applicant_type',
        'sex',
        'birthdate',
        'phone_num',
        'fb_link',
        'religion',
        'avatar',
        // family data
        'total_fam_members',
        'birth_order',
        // educational background
        'last_school',
        'last_school_address',
        'school_type',
        'lrn',
        'esc_grantee',
        'esc_num',
        // other information
        'free_ebill_reason',
        'data_privacy_consent',
        'date_accomplished',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function email()
    {
        return $this->belongsTo(User::class, 'user_email', 'email');
    }

    public function address()
    {
        return $this->hasOne(ApplicantAddress::class);
    }

    public function siblings()
    {
        return $this->hasMany(ApplicantSibling::class);
    }

    public function mother()
    {
        return $this->hasOne(ApplicantMother::class);
    }

    public function father()
    {
        return $this->hasOne(ApplicantFather::class);
    }

    public function guardian()
    {
        return $this->hasOne(ApplicantGuardian::class);
    }

    public function acadAwards()
    {
        return $this->hasMany(AcadAward::class);
    }

    public function gadgets()
    {
        return $this->hasMany(Gadget::class);
    }

    public function internetTypes()
    {
        return $this->hasMany(InternetType::class);
    }

    public function electricBills()
    {
        // plural
        return $this->hasMany(ElectricBills::class);
    }

    public function houseOwnerships()
    {
        return $this->hasOne(HouseOwnership::class);
    }

    public function applicationStatus()
    {
        return $this->hasOne(ApplicationStatus::class);
    }

    public function examScores()
    {
        // plural
        return $this->hasOne(ExamScores::class);
    }

    public function evaluations()
    {
        // plural
        return $this->hasMany(Evaluations::class);
    }

    public function batches()
    {
        return $this->hasOne(Batch::class);
    }
}
