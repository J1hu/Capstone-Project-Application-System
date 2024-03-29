<?php

namespace App\Models;

use App\Models\Program;
use App\Models\ElectricBill;
use App\Models\Preassessment;
use App\Models\ApplicantStatus;
use App\Models\ApplicationStatus;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\HasDatabaseNotifications;

class Applicant extends Model implements Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasDatabaseNotifications;

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
        'certificate',
        // family data
        'total_fam_children',
        'birth_order',
        // educational background
        'last_school',
        'last_school_address',
        'school_type',
        'lrn',
        'esc_grantee',
        'esc_num',
        'report_card',
        'program_id',
        // other information
        'ebill_proof',
        'free_ebill_reason',
        'monthly_rental',
        'contact_consent',
        'data_privacy_consent',
        'batch_id',
        'exam_score_id',
        'application_status_id',
        'applicant_status_id',
    ];

    public function notifications()
    {
        return $this->morphMany(\Illuminate\Notifications\DatabaseNotification::class, 'notifiable')->orderBy('created_at', 'desc');
    }

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
        return $this->hasMany(ElectricBill::class);
    }

    public function houseOwnership()
    {
        return $this->hasOne(HouseOwnership::class);
    }

    public function examScore()
    {
        return $this->hasOne(ExamScore::class);
    }

    public function initialAssessment()
    {
        return $this->hasOne(InitialAssessment::class);
    }

    public function finalAssessment()
    {
        return $this->hasOne(FinalAssessment::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function application_status()
    {
        return $this->belongsTo(ApplicationStatus::class);
    }

    public function applicant_status()
    {
        return $this->belongsTo(ApplicantStatus::class);
    }

    public function preassessment()
    {
        return $this->hasOne(Preassessment::class);
    }

    public function getAuthIdentifierName()
    {
        return 'id'; // Replace with the actual identifier name for your model
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Replace with the actual remember token column name in your model's table
    }

    public function applicantStatus()
    {
        return $this->belongsTo(ApplicantStatus::class);
    }

    // for Dashboard
    public static function getTotalApplicants()
    {
        return self::count();
    }

    public static function getPendingApplicants()
    {
        return self::whereHas('applicantStatus', function ($query) {
            $query->where('applicant_status_name', 'pending');
        })->count();
    }

    public static function getEvaluatedApplicants()
    {
        return self::whereHas('applicantStatus', function ($query) {
            $query->where('applicant_status_name', 'evaluated');
        })->count();
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
