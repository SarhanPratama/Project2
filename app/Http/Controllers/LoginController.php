<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function login() {
        $title = 'Login';

        return view('auth.login')
        ->with('title', $title)
        ;
    }

    public function proseslogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials, $request->boolean('remember'))) {

            $request->session()->regenerate();


            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect('dashboard');
            }


            return redirect('/')->with('success', 'Anda berhasil login');
        }


        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function logout() {
        session()->flush();
        Auth::logout();

        return redirect('login');
    }

}
