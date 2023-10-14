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
        <h1 class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">Dashboard</h1>

        <?php if(Auth::check()): ?>
            You are logged in as
            <strong><?= auth()->user()->username ?></strong> |
            <a href="/console/logout/">Logout</a> |
            <a href="/console/dashboard">Dashboard</a> |
            <a href="/">Homepage</a>

        <?php else: ?>
            <a href="/">Return to Homepage</a>
        <?php endif; ?>
    </header>

    <section class="p-3 m-5 border border-primary-subtle rounded-3">
        <h2 class="text-primary-emphasis">Three simple steps to better financial health!</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit veniam ut eius provident perferendis molestiae neque suscipit voluptatum consequuntur quas quam vel natus, in, placeat dolores deleniti impedit tempore accusantium?</p>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>