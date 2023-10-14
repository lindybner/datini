<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Overview</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/app.css">
    <script src="/app.js"></script>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary px-5 py-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Datini</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" href="/console/overview">Overview</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/console/cash-flow">Cash Flow</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/console/balance-sheet">Balance Sheet</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/console/logout">Logout</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 m-5">
            <h1>
                Overview
            </h1>
            <?php if(Auth::check()): ?>
                Logged in as
                <strong><?= auth()->user()->username ?></strong>!

            <?php else: ?>
                <a href="/">Return to Homepage</a>
            <?php endif; ?>
        </div>
    </header>

    <section class="p-3 m-5 border border-primary-subtle rounded-3">
        <h2 class="text-primary-emphasis">Three simple steps to better financial health!</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit veniam ut eius provident perferendis molestiae neque suscipit voluptatum consequuntur quas quam vel natus, in, placeat dolores deleniti impedit tempore accusantium?</p>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>