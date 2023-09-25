<?php

namespace App\Http\Controllers;

use App\Models\Session; // Assuming you have a Session model in the App\Models namespace
use Illuminate\Support\Facades\Cookie; // Add this at the top of your file
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SessionController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Store a newly created session in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $session = Session::create(['uuid' => Str::uuid()]);
        return redirect()->route('session.show', ['uuid' => $session->uuid])
            ->withCookie('last_session_uuid', $session->uuid, 60); // 60 minutes
    }




    /**
     * Display the specified session.
     *
     * @param  string  $uuid
     * @return \Illuminate\View\View
     */
    public function show($uuid)
    {
        $session = Session::where('uuid', $uuid)->firstOrFail();
        return view('session', compact('session'));
    }
    
    

    

    // app/Http/Controllers/SessionController.php

    public function captureData($uuid, Request $request)
    {
        $session = Session::where('uuid', $uuid)->firstOrFail();

        // Log the received request to the database
        $session->requests()->create([
            'method' => $request->method(),
            'headers' => json_encode($request->headers->all()),
            'body' => $request->getContent(),
            'query_params' => json_encode($request->query()),
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'timestamp' => now(),
        ]);

        return response()->noContent();
    }




    public function showRequest($sessionUuid, $requestId)
    {
        $session = Session::where('uuid', $sessionUuid)->firstOrFail();
        $request = $session->requests()->findOrFail($requestId);

        return view('request', compact('session', 'request'));
    }

    
}
