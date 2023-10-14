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

    <header class="m-5">
        <h1 class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">Login</h1>
    </header>

    <section class="p-3 m-5 border border-primary-subtle rounded-3">
        
        <form action="/console/login" method="post" novalidation>
        
            <?= csrf_field() ?>

            <div class="mb-3">
                <div><label for="username">Username:</label></div>
                <div><input type="text" name="username" id="username" placeholder="username" value="<?= old('username') ?>"></div>
            </div>
            <div class="mb-3">
                <div><label for="password">Password:</label></div>
                <div><input type="password" name="password" id="password" placeholder="password"></div>
            </div>

            <button type="submit" class="btn btn-outline-primary btn-lg">Log In</button>

        </form>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>