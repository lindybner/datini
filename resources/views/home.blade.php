@extends('layouts.layout')

@section('title', 'Welcome')

@section('content')

        <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 m-5">
            <h1>
                Welcome!
            </h1>
            <?php if(Auth::check()): ?>
                Logged in as
                <strong><?= auth()->user()->username ?></strong>!

            <?php else: ?>
                <a href="/login">Login</a> or <a href="/register">signup</a> to do more!
            <?php endif; ?>
        </div>
    </header>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">
                            <div>Step 1:</div>
                            <div>Set the Time Period</div>
                        </h2>
                        <p class="card-text">Enter the "month" and "year" for the period you are entering statement balances for. If it's already in the database, go to step 2!</p>
                        <a class="btn btn-primary" href="/months/list" role="button">Months</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">
                            <div>Step 2:</div>
                            <div>Asset &amp; Liability</div>
                        </h2>
                        <p class="card-text">Once you've selected your period, enter the balances on your statements for assets (what you own) and liabilities (what you owe).</p>
                        <a class="btn btn-primary" href="/balances/list" role="button">Balances</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">
                            <div>Step 3:</div>
                            <div>Cash inflow &amp; outflow</div>
                        </h2>
                        <p class="card-text">Finally, figure out your cashflow &mdash; enter the amount for your inflow (what you've earned) and outflow (what you've spent).</p>
                        <a class="btn btn-primary" href="/flows/list" role="button">Flows</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
@endsection