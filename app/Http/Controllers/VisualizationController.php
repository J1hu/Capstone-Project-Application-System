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
        ));
    }
}
