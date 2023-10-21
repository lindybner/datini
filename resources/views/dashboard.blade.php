<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

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
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 m-5">
            <h1>
                Dashboard
            </h1>
            <?php if(Auth::check()): ?>
                Logged in as
                <strong><?= auth()->user()->username ?></strong>!

            <?php else: ?>
                <a href="/">Return to Homepage</a>
            <?php endif; ?>
        </div>
    </header>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Step 1</h2>
                        <p class="card-text">Set the period: Enter the "year" and "month" for the period you are entering statement balances for. If it's already in the database, go to step 2!</p>
                        <a class="btn btn-primary" href="/months/list" role="button">Months</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Step 2</h2>
                        <p class="card-text">Once you've selected your period, enter the balances on your statements for assets (what you own) and liabilities (what you owe).</p>
                        <a class="btn btn-primary" href="/balances/list" role="button">Balances</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Step 3</h2>
                        <p class="card-text">Finally, figure out your cashflow: Enter the amount for your inflow (what you've earned) and outflow (what you've spent).</p>
                        <a class="btn btn-primary" href="/flows/list" role="button">Flows</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>