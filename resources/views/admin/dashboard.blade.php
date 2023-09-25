<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="mb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">reqInspect - Admin Dashboard</a>


        </nav>
    </header>
    <div class="container mt-5">
        <!-- Top Card for Complete Statistics -->
        <div class="row mb-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Complete Statistics</h5>
                        <h5>Total Sessions: {{ $totalSessions }} <span class="text-success">( +{{ $newSessionsToday }} )</span></h5>
                        <h5>Total Captures: {{ $totalCaptures }} <span class="text-success">( +{{ $newCapturesToday }} )</span></h5>
                        <h5>Total Captures Table Rows Count: {{ $totalCaptureRows }}</h5>
                        <h5>Database Size in MB: {{ $dbSize }}</h5>
                    </div>
                </div>

            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">Feedback Viewer</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Identifier</th>
                            <th scope="col">Type</th>
                            <th scope="col">Message</th>
                            <th scope="col">Submitted At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedbackItems as $feedback)
                        <tr>
                            <th scope="row">{{ $feedback->id }}</th>
                            <td>{{ $feedback->identifier }}</td>
                            <td>{{ $feedback->type }}</td>
                            <td>{{ $feedback->message }}</td>
                            <td>{{ $feedback->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $feedbackItems->links() }} <!-- Pagination Links -->
            </div>
        </div>
    </div>
</body>

</html>