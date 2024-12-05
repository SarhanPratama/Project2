<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class staffController extends Controller
{
    public function index() {

        return view('Admin.member.staff');
    }

    public function create() {

        return view('Admin.member.add-staff');
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'remember_token' => Str::random(60),
            'email_verified_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('staff')->with('success', 'Register Staff Berhasil');
    }
}
