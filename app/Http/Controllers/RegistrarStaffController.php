<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RegistrarStaffController extends Controller
{
    public function index()
    {
        $staffs = User::role('registrar_staff')->paginate(15);
        return view('staffs.list', compact('staffs'));
    }

    public function create()
    {
        return view('staffs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|same:password',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(60), // Generate a random remember token
        ]);

        $user->assignRole('registrar_staff');

        return redirect()->route('staffs.list')
            ->with('success', 'User created successfully.')
            ->withInput($request->except('password', 'password_confirmation'));
    }

    public function edit(User $staff)
    {
        return view('staffs.edit', compact('staff'));
    }

    public function update(Request $request, User $staff)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $staff->id,
            'password' => 'string|min:8|nullable',
            'confirm_password' => 'string|same:password|nullable',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $staff->update($validatedData);

        return redirect()->route('staffs.list')
            ->with('success', 'Mancom updated successfully');
    }
}
