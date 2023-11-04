<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Balance</title>

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
                Add a new balance
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
        <form action="/balances/add" method="POST" novalidate>
            <?= csrf_field() ?>

            <div class="my-3">
                <label for="month_id">Month:</label>
                <select name="month_id" id="month_id" class="form-select">
                    @foreach($months as $month)
                        <option value="{{ $month->id }}">{{ $month->month }} {{ $month->year }}</option>
                    @endforeach
                </select>
            </div>

            <div class="my-3">
                <label for="asset">Asset:</label>
                <input type="number" name="asset" id="asset">
            </div>

            <?php if($errors->first('asset')): ?>
                <span class="text-danger"><?= $errors->first('asset') ?></span>
                <br>
            <?php endif; ?>
            
            <div class="my-3">
                <label for="liability">Liability:</label>
                <input type="number" name="liability" id="liability">
            </div>

            <?php if($errors->first('liability')): ?>
                <span class="text-danger"><?= $errors->first('liability') ?></span>
                <br>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary my-3">Add Balance</button>
        </form>


        <a href="/balances/list">Back to Balances</a>
    </div>

</body>
</html>