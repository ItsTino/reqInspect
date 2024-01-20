<!-- resources/views/session.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Session Details - {{ $session->uuid }}</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-83MQHK9J10"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-83MQHK9J10');
    </script>


</head>

<body class="d-flex flex-column min-vh-100">
    <header class="mb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href={{ url('/') }}>reqInspect</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:location.reload()">Reload</a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="container mb-auto">
        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-12">
                <!-- Session Details Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3>Session Details <x-feedback-button /></h3>
                    </div>
                    <div class="card-body">
                        <p><strong>UUID:</strong> {{ $session->uuid }}</p>
                        <p><strong>Capture URL:</strong> <a href="{{ url('/capture/' . $session->uuid) }}" target="_blank">{{ url('/capture/' . $session->uuid) }}</a></p>
                    </div>
                </div>

                <!-- No Requests Instruction Card -->
                @if($session->requests()->count() == 0)
                <div class="card mb-4">
                    <div class="card-header">
                        <h3>Start Capturing Requests!</h3>
                    </div>
                    <div class="card-body">
                        <p>It seems like you haven't captured any requests yet. You can start by using the following curl command:</p>
                        <pre><code style="display: block; padding: 10px; background-color: #f8f9fa; color: #e83e8c; white-space: pre-wrap;">curl -X GET "{{ url('/capture/' . $session->uuid) }}?exampleParam=exampleValue"</code></pre>
                        <p>This is just a simple GET request example. You can capture any HTTP requests sent to the Capture URL above.</p>
                    </div>
                </div>
                @endif

                <!-- Latest Request Details Card -->
                @if($latestRequest = $session->requests()->latest()->first())
                <div class="card mb-4">
                    <div class="card-header">
                        <h3>Latest Request Details</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Method:</strong> {{ $latestRequest->method }}</p>
                        <p><strong>IP Address:</strong> {{ $latestRequest->ip_address }}</p>
                        <p><strong>User Agent:</strong> {{ $latestRequest->user_agent }}</p>
                        <p><strong>Timestamp:</strong> {{ $latestRequest->timestamp }}</p>
                        <p><strong>Headers:</strong>
                        <pre>{{ json_encode(json_decode($latestRequest->headers), JSON_PRETTY_PRINT) }}</pre>
                        </p>
                        <p><strong>Body:</strong>
                        <pre>{{ json_encode(json_decode($latestRequest->body ), JSON_PRETTY_PRINT) }}</pre>
                        </p>
                        <p><strong>Query Parameters:</strong>
                        <pre>{{ json_encode(json_decode($latestRequest->query_params), JSON_PRETTY_PRINT) }}</pre>
                        </p>
                    </div>
                </div>
                @endif

                <!-- Captured Requests List Card -->
                <!-- Captured Requests List Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3>Captured Requests</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($requests as $request)
                            <li class="list-group-item">
                                <strong>{{ $request->method }}</strong> at {{ $request->created_at }}
                                <a href="{{ route('session.showRequest', ['sessionUuid' => $session->uuid, 'requestId' => $request->id]) }}" class="float-right">View Details</a>
                            </li>
                            @empty
                            <li class="list-group-item">No requests captured yet.</li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        {{ $requests->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-3">
        <p>reqInspect for Alpine Technica 2022 - 2023</p>
    </footer>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>