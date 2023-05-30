<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use DB;

class VisualizationController extends Controller
{
    public function index()
    {
        // gender pie chart
        $female = Applicant::where('sex', 'Female')->count();
        $male = Applicant::where('sex', 'Male')->count();

        // per program chart
        $bsis = Applicant::where('program_id', 1)->count();
        $act = Applicant::where('program_id', 2)->count();
        $bsais = Applicant::where('program_id', 3)->count();
        $bsa = Applicant::where('program_id', 4)->count();
        $bab = Applicant::where('program_id', 5)->count();
        $bssw = Applicant::where('program_id', 6)->count();
        $all = Applicant::count();

        //religion
        $mcgi = Applicant::where('religion', 'MCGI')->count();
        $catholic = Applicant::where('religion', 'Roman Catholic')->count();
        $jw = Applicant::where('religion', 'Jehovah\'s Witnesses')->count();
        $inc = Applicant::where('religion', 'Iglesia ni Cristo')->count();
        $sda = Applicant::where('religion', 'Seventh-day Adventist')->count();
        $baptist = Applicant::where('religion', 'Bible Baptist Church')->count();
        $bornagain = Applicant::where('religion', 'Born Again Christian')->count();
        $islam = Applicant::where('religion', 'Islam')->count();
        $others = Applicant::where('religion', 'Others')->count();

        //last school
        $public = Applicant::where('school_type', 'Public')->count();
        $private = Applicant::where('school_type', 'Private')->count();
        $s_university = Applicant::where('school_type', 'State University')->count();

        //get gender per program
        $bsismale = Applicant::where('program_id', 1)->where('sex', 'Male')->count();
        $bsisfemale = Applicant::where('program_id', 1)->where('sex', 'Female')->count();

        $actmale = Applicant::where('program_id', 2)->where('sex', 'Male')->count();
        $actfemale = Applicant::where('program_id', 2)->where('sex', 'Female')->count();

        $bsaismale = Applicant::where('program_id', 3)->where('sex', 'Male')->count();
        $bsaisfemale = Applicant::where('program_id', 3)->where('sex', 'Female')->count();

        $bsamale = Applicant::where('program_id', 4)->where('sex', 'Male')->count();
        $bsafemale = Applicant::where('program_id', 4)->where('sex', 'Female')->count();

        $babmale = Applicant::where('program_id', 5)->where('sex', 'Male')->count();
        $babfemale = Applicant::where('program_id', 5)->where('sex', 'Female')->count();

        $bsswmale = Applicant::where('program_id', 6)->where('sex', 'Male')->count();
        $bsswfemale = Applicant::where('program_id', 6)->where('sex', 'Female')->count();

        return view('admin.visualization', compact(
            'female',
            'male',
            'bsis',
            'act',
            'bsais',
            'bsa',
            'bab',
            'bssw',
            'all',
            //Religion
            'mcgi',
            'catholic',
            'jw',
            'inc',
            'sda',
            'baptist',
            'bornagain',
            'islam',
            'others',

            //school type
            'public',
            'private',
            's_university',

            //gender per program
            'bsismale',
            'bsisfemale',
            'actmale',
            'actfemale',
            'bsaismale',
            'bsaisfemale',
            'bsamale',
            'bsafemale',
            'babmale',
            'babfemale',
            'bsswmale',
            'bsswfemale',
        ));
    }
}
