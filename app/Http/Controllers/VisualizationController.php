<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use DB;

class VisualizationController extends Controller
{
    public function index()
    {
        $female = Applicant::where('sex', 'Female')->count();
        $male = Applicant::where('sex', 'Male')->count();

        $bsis = Applicant::where('program_id', 1)->count();
        $act = Applicant::where('program_id', 2)->count();
        $bsais = Applicant::where('program_id', 3)->count();
        $bsa = Applicant::where('program_id', 4)->count();
        $bab = Applicant::where('program_id', 5)->count();
        $bssw = Applicant::where('program_id', 6)->count();
        $all = Applicant::count();

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
        ));
    }
}
