<!-- resources/views/statistics.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>reqInspect - Statistics</title>
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
                    <li class="nav-item">
                        <a class="nav-link" href={{ url('/') }}>Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href={{ url('/statistics') }}>Stats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://alpine.cx/">Alpine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://valentino.cx/">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container mb-auto">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="text-center mb-4">
                    <h1>reqInspect Statistics</h1>
                    <p>Overview of the usage statistics of reqInspect.</p>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <p>Total Sessions Created: {{ $totalSessions }}</p>
                        <p>Total Requests Captured: {{ $totalRequests }}</p>
                        <p>Average Requests Captured per day: {{ number_format($averageRequestsPerDay, 2) }}</p>
                        <p>Average Sessions created per day: {{ number_format($averageSessionsPerDay, 2) }}</p>
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
</body>

</html>