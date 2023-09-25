<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'identifier' => 'nullable|string', // Updated from email to identifier
            'type' => 'required|in:comment,issue,other',
            'message' => 'required',
        ]);
    
        $identifier = $request->input('identifier') ?: $request->ip(); // If identifier is empty, use IP address
    
        Feedback::create([
            'identifier' => $identifier,
            'type' => $request->input('type'),
            'message' => $request->input('message'),
        ]);
    
        return response()->json(['message' => 'Feedback submitted successfully!']);
    }
    
}
