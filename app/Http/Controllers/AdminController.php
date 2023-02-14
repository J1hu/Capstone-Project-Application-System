<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // this is just a testing method for admin
    public function test()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }
}
