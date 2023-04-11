<?php

namespace App\Models;

use App\Models\Program;
use App\Models\ElectricBill;
use App\Models\ApplicationStatus;
use App\Models\ApplicantStatus;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Applicant extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'program_id',
        // other information
        'free_ebill_reason',
        'monthly_rental',
        'data_privacy_consent',
        'date_accomplished',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->fname} {$this->mname} {$this->lname}";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
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
        return $this->hasMany(ElectricBill::class);
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
        return $this->hasOne(ExamScore::class);
    }

    public function evaluations()
    {
        // plural
        return $this->hasMany(Evaluation::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function statuses()
    {
        return $this->belongsTo(ApplicationStatus::class);
    }

    public function applicant_status()
    {
        return $this->belongsTo(ApplicantStatus::class);
    }

    //Applicant Milestones
    public function isVerified()
    {
        //
    }

    public function isFormSubmitted()
    {
        //
    }

    public function isAssessed()
    {
        //
    }

    public function hasExam()
    {
        //
    }

    public function isInterviewed()
    {
        //
    }

    public function hasStatus()
    {
        //
    }
}
