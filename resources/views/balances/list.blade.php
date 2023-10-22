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
                        <a class="nav-link" href="/dashboard">Dashboard</a>
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
                Balances
            </h1>
            <?php if(Auth::check()): ?>
                Logged in as
                <strong><?= auth()->user()->username ?></strong>!

            <?php else: ?>
                <a href="/">Return to Homepage</a>
            <?php endif; ?>
        </div>
    </header>

    <?php if(session()->has('message')): ?>
        <div class="text-danger m-5 p-3 text-center border border-danger rounded-3">
            <?= session()->get('message') ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Month</th>
                    <th scope="col">Asset</th>
                    <th scope="col">Liability</th>
                    <th scope="col">Net Worth</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($balances as $key => $value): ?>
                <tr>
                    <td><?= $value->month->month ?> <?= $value->month->year ?></td>
                    <td>$<?= number_format($value->asset, 2, '.', ',') ?></td>
                    <td>$<?= number_format($value->liability, 2, '.', ',') ?></td>
                    <td><strong>$<?= number_format($value->asset - $value->liability, 2, '.', ',') ?></strong></td>
                    <td><a href="/balances/edit/<?= $value->id ?>">Edit</a> | <a class="text-danger" href="/balances/delete/<?= $value->id ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="/balances/add">Add a new balance record</a>
    </div>

</body>
</html>