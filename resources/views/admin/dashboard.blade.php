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
                        <p class="card-text">Here you can display complete statistics of the system.</p>
                        <!-- Include the statistics here -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Three Cards in the Middle Row for Sections 1, 2, 3 -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Section 1</h5>
                        <p class="card-text">Brief overview for Section 1.</p>
                        <!-- Include the content for Section 1 here -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Section 2</h5>
                        <p class="card-text">Brief overview for Section 2.</p>
                        <!-- Include the content for Section 2 here -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Section 3</h5>
                        <p class="card-text">Brief overview for Section 3.</p>
                        <!-- Include the content for Section 3 here -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Three Cards in the Bottom Row for Sections 4, 5, 6 -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Section 4</h5>
                        <p class="card-text">Brief overview for Section 4.</p>
                        <!-- Include the content for Section 4 here -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Section 5</h5>
                        <p class="card-text">Brief overview for Section 5.</p>
                        <!-- Include the content for Section 5 here -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Section 6</h5>
                        <p class="card-text">Brief overview for Section 6.</p>
                        <!-- Include the content for Section 6 here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>