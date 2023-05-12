<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluators = User::role('program_head')->cursorPaginate(15);
        return view('evaluators.list', compact('evaluators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::all();
        return view('evaluators.create', ['programs' => $programs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'program_id' => 'required|array',
            'program_id.*' => 'required|exists:programs,id',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|same:password',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'email_verified_at' => Carbon::now(),
        ]);

        $programIds = $validatedData['program_id'];
        $programs = Program::find($programIds);
        $user->programs()->saveMany($programs);

        $user->assignRole('program_head');

        return redirect()->route('evaluators.list')
            ->with('success', 'User created successfully.')
            ->withInput($request->except('password', 'password_confirmation'))
            ->withErrors(['program_id' => 'Please select at least one program.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function settings()
    {
        return view('settings');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $evaluator)
    {
        $programs = Program::all();
        return view('evaluators.edit', compact('evaluator'), ['programs' => $programs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $evaluator)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $evaluator->id,
            'password' => 'string|min:8|nullable',
            'confirm_password' => 'string|same:password|nullable',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $evaluator->update($validatedData);

        $evaluator->programs()->sync($request->program_id);

        return redirect()->route('evaluators.list')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
