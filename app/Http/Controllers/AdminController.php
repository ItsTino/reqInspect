<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;
use App\Models\Session;
use App\Models\ReceivedRequest;
use App\Models\Feedback;

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
        // Get total sessions
        $totalSessions = Session::count();
        $newSessionsToday = Session::whereDate('created_at', Carbon::today())->count();

        // Get total captures
        $totalCaptures = ReceivedRequest::count();
        $newCapturesToday = ReceivedRequest::whereDate('created_at', Carbon::today())->count();

        // Get total captures table rows count
        $totalCaptureRows = DB::table('received_requests')->count(); // Replace 'received_requests' with your actual table name if different

        // Get Database Size
        $dbSize = DB::select('SELECT ROUND(SUM(data_length + index_length) / 1024 / 1024, 1) AS size FROM information_schema.tables WHERE table_schema = ?', [env('DB_DATABASE')])[0]->size;

        //Get Feedback Items
        $feedbackItems = Feedback::latest()->paginate(10);

        return view('admin.dashboard', compact('feedbackItems', 'totalSessions', 'newSessionsToday', 'totalCaptures', 'newCapturesToday', 'totalCaptureRows', 'dbSize'));
    }
}
