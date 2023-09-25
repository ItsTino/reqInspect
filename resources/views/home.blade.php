<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>reqInspect - Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="mb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">reqInspect</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ url('/statistics') }}>Stats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://alpine.cx/">Alpine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://valentino.cx/">Contact</a>
                    </li>
                    <li class="nav-item">
                        <x-feedback-button />
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container mb-auto">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="text-center mb-4">
                    <h1>Welcome to reqInspect</h1>
                    <p>Inspect web requests and debug online apps, API calls, and webhooks easily.</p>
                    <p>Free, unlimited (15req/s) usage. No sign-up required.</p>
                </div>
                <form action="{{ url('/session') }}" method="POST" class="mb-3">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-block">Create New Session</button>
                </form>
                <form action="#" method="GET" onsubmit="loadSession(); return false;" class="mb-3">
                    <div class="input-group">
                        <input type="text" id="uuid" class="form-control" placeholder="Enter UUID" value="{{ request()->cookie('last_session_uuid') ?? '' }}" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Load Session</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5>Basic Instructions & Examples</h5>
                    </div>
                    <div class="card-body">
                        <p>Create a new session and use the provided URL to capture web requests. View the details of the received requests in real-time.</p>
                        <pre><code id="basicExample1" style="display: block; padding: 10px; background-color: #f8f9fa; color: #e83e8c; white-space: pre-wrap;">curl -X GET "http://your-url/capture/your-uuid?param1=value1&param2=value2"</code></pre>
                        <button onclick="copyToClipboard('basicExample1')" class="btn btn-sm btn-outline-secondary">Copy Code</button>
                        <pre><code id="basicExample2" style="display: block; padding: 10px; background-color: #f8f9fa; color: #e83e8c; white-space: pre-wrap;">curl -X POST "http://your-url/capture/your-uuid" -d "key1=value1&key2=value2"</code></pre>
                        <button onclick="copyToClipboard('basicExample2')" class="btn btn-sm btn-outline-secondary">Copy Code</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5>Advanced Instructions & Examples</h5>
                    </div>
                    <div class="card-body">
                        <p>Use the curl commands to send requests with different HTTP methods, headers, and body content to the capture URL.</p>
                        <pre><code id="advancedExample1" style="display: block; padding: 10px; background-color: #f8f9fa; color: #e83e8c; white-space: pre-wrap;">curl -X POST "http://your-url/capture/your-uuid" -H "Content-Type: application/json" -d '{"key1":"value1","key2":"value2"}'</code></pre>
                        <button onclick="copyToClipboard('advancedExample1')" class="btn btn-sm btn-outline-secondary">Copy Code</button>
                        <pre><code id="advancedExample2" style="display: block; padding: 10px; background-color: #f8f9fa; color: #e83e8c; white-space: pre-wrap;">curl -X PUT "http://your-url/capture/your-uuid" -H "Content-Type: application/json" -d '{"key1":"newvalue1","key2":"newvalue2"}'</code></pre>
                        <button onclick="copyToClipboard('advancedExample2')" class="btn btn-sm btn-outline-secondary">Copy Code</button>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>About reqInspect</h5>
                        </div>
                        <div class="card-body">
                            <p>reqInspect is for the developers, testers, tinkers and explorers. Inspect the contents of any web request you can imagine by forwarding it to your unique reqInspect capture page.</p>
                            <p>Examples of use include:</p>
                            <ul>
                                <li>Debugging applications by capturing incoming requests.</li>
                                <li>Rapid development and testing of APIs by inspecting request payloads and headers.</li>
                                <li>Security testing by analyzing requests for vulnerabilities.</li>
                                <li>General learning and exploration of web technologies.</li>
                            </ul>
                            <p>Get started now by generating a new session and sending some packets to the capture page</p>
                            <p><strong>Note:</strong> Capture Data expires after 7 days.</p>
                            <p><strong>Note:</strong> Cookies are mandatory on this site.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-3">
        <p>reqInspect for Alpine Technica 2022 - 2023</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function loadSession() {
            const uuid = document.getElementById('uuid').value;
            window.location.href = `/session/${uuid}`;
        }

        function copyToClipboard(elementId) {
            const str = document.getElementById(elementId).innerText;
            const el = document.createElement('textarea');
            el.value = str;
            el.setAttribute('readonly', '');
            el.style.position = 'absolute';
            el.style.left = '-9999px';
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
        }
    </script>
</body>

</html>