<!-- resources/views/request.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Request Details - {{ $request->id }}</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">


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

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">reqInspect</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('session.show', ['uuid' => $session->uuid]) }}">Back to Session</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Request Details <x-feedback-button /></h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Method:</strong> {{ $request->method }}</p>
                        <p><strong>IP Address:</strong> {{ $request->ip_address }}</p>
                        <p><strong>User Agent:</strong> {{ $request->user_agent }}</p>
                        <p><strong>Timestamp:</strong> {{ $request->timestamp }}</p>
                        <p><strong>Headers:</strong>
                        <pre>{{ json_encode(json_decode($request->headers), JSON_PRETTY_PRINT) }}</pre>
                        </p>
                        <p><strong>Body:</strong>
                        <pre>{{ json_encode(json_decode($request->body), JSON_PRETTY_PRINT) }}</pre>
                        </p>
                        <p><strong>Query Parameters:</strong>
                        <pre>{{ json_encode(json_decode($request->query_params), JSON_PRETTY_PRINT) }}</pre>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-light text-center text-lg-start mt-5">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            reqInspect for Alpine Technica 2022 - 2023
        </div>
    </footer>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>