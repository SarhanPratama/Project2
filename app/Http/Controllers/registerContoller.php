<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class registerContoller extends Controller
{
    public function registerView() {
        $title = 'Register';

        return view('auth.register')
        ->with('title', $title)
        ;
    }

    public function proccessRegister(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'remember_token' => Str::random(60), // Generate random remember token
            'email_verified_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('login')->with('success', 'Register Berhasil');
    }

    public function updateProfile(Request $request)
{

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . auth()->id(),
        'password' => 'nullable|min:6|confirmed',
    ]);


    DB::table('users')->where('id', auth()->id())->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->filled('password') ? Hash::make($request->password) : auth()->user()->password,
    ]);

    return redirect()->back()->with('success', 'Profile updated successfully!');
}
}
