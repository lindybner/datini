<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Datini') | Datini</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/app.css">
    <script src="/app.js"></script>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary px-5 py-3">
            <div class="container-fluid">
                <a class="navbar-brand fw-semibold" href="/">Datini</a>
                <span class="navbar-text fst-italic">
                    In 3 simple steps, get all your personal finances in order!
                </span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/months/list">Months</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/balances/list">Balances</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/flows/list">Flows</a>
                    </li>
                    @guest
                    <!-- Show "Log in" if the user is not authenticated (guest) -->
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <!-- Show "Register" if the user is not authenticated (guest) -->
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                    @else
                    <!-- Show "Log out" if the user is authenticated -->
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                    @endguest
                </ul>
                </div>
            </div>
        </nav>

    <!-- Content Section -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Common Footer -->
    <footer>
        <!-- Your footer content goes here -->
    </footer>
</body>
</html>
