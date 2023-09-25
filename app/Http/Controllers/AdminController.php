<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $hashedPassword = config('admin.password'); // Assuming you have the hashed password stored in a config or .env file

        if (Hash::check($request->input('password'), $hashedPassword)) {
            $request->session()->put('admin_password', $hashedPassword);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['password' => 'Incorrect password']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_password');
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
