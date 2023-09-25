<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        if ($request->input('password') === config('admin.password')) {
            $request->session()->put('admin_password', $request->input('password'));
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
