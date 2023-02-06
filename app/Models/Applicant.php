<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
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
}
