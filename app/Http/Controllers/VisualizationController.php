<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisualizationController extends Controller
{
    public function index()
    {
        return view('admin.visualization');
    }
}
