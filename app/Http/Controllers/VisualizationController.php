<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\ApplicantAddress;

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

        //get applicants per region
        $region1 = Applicant::whereHas('address', function ($query) {
            $query->where('region', 1);
        })->count();

        $region2 = Applicant::whereHas('address', function ($query) {
            $query->where('region', 2);
        })->count();

        $region3 = Applicant::whereHas('address', function ($query) {
            $query->where('region', 3);
        })->count();

        $region4a = Applicant::whereHas('address', function ($query) {
            $query->where('region', 4);
        })->count();

        $region4b = Applicant::whereHas('address', function ($query) {
            $query->where('region', 5);
        })->count();

        $region5 = Applicant::whereHas('address', function ($query) {
            $query->where('region', 6);
        })->count();

        $region6 = Applicant::whereHas('address', function ($query) {
            $query->where('region', 7);
        })->count();

        $region7 = Applicant::whereHas('address', function ($query) {
            $query->where('region', 8);
        })->count();

        $region8 = Applicant::whereHas('address', function ($query) {
            $query->where('region', 9);
        })->count();

        $region9 = Applicant::whereHas('address', function ($query) {
            $query->where('region', 10);
        })->count();

        $region10 = Applicant::whereHas('address', function ($query) {
            $query->where('region', 11);
        })->count();

        $region11 = Applicant::whereHas('address', function ($query) {
            $query->where('region', 12);
        })->count();

        $region12 = Applicant::whereHas('address', function ($query) {
            $query->where('region', 13);
        })->count();

        $region13 = Applicant::whereHas('address', function ($query) {
            $query->where('region', 14);
        })->count();

        $barmm = Applicant::whereHas('address', function ($query) {
            $query->where('region', 15);
        })->count();

        $car = Applicant::whereHas('address', function ($query) {
            $query->where('region', 16);
        })->count();

        $ncr = Applicant::whereHas('address', function ($query) {
            $query->where('region', 17);
        })->count();

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

            //region
            'region1',
            'region2',
            'region3',
            'region4a',
            'region4b',
            'region5',
            'region6',
            'region7',
            'region8',
            'region9',
            'region10',
            'region11',
            'region12',
            'region13',
            'barmm',
            'car',
            'ncr',
        ));
    }
}
