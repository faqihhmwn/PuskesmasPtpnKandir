<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('components.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Dummy data
        $dummyEmail = 'admin@puskesmas.id';
        $dummyPassword = 'admin123';

        if ($request->email === $dummyEmail && $request->password === $dummyPassword) {
            // Simpan status login di session
            session(['logged_in' => true, 'user_email' => $dummyEmail]);
            return view('dashboard');
        }

        return back()->with('error', 'Email atau password salah.');
    }
}
