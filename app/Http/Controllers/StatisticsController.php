<?php
namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\ReceivedRequest; // Corrected to your actual Request model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatisticsController extends Controller
{
    public function index()
    {
        $totalSessions = Session::count();
        $totalRequests = ReceivedRequest::count(); // Corrected to your actual Request model
        
        $averageRequestsPerDay = DB::table('received_requests') // Corrected to your actual Request table
            ->select(DB::raw('AVG(day_total) as avg_requests'))
            ->fromSub(function ($query) {
                $query->from('received_requests') // Corrected to your actual Request table
                    ->select(DB::raw('COUNT(*) as day_total'))
                    ->groupBy(DB::raw('DATE(created_at)'));
            }, 'daily_totals')
            ->first()->avg_requests;
        
        $averageSessionsPerDay = DB::table('sessions')
            ->select(DB::raw('AVG(day_total) as avg_sessions'))
            ->fromSub(function ($query) {
                $query->from('sessions')
                    ->select(DB::raw('COUNT(*) as day_total'))
                    ->groupBy(DB::raw('DATE(created_at)'));
            }, 'daily_totals')
            ->first()->avg_sessions;
        
        // You will need to implement logic to calculate the heatmap data based on the geolocation of users.
        // This might involve storing user IP addresses and using an IP geolocation service to determine their locations.
        
        return view('statistics', compact('totalSessions', 'totalRequests', 'averageRequestsPerDay', 'averageSessionsPerDay'));
    }
}

