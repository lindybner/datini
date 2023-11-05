@extends('layouts.layout')

@section('title', 'Balances')

@section('content')

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
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Action</th>
                    <th scope="col">Month</th>
                    <th scope="col">Asset ($)</th>
                    <th scope="col">Liability ($)</th>
                    <th scope="col">Debt Ratio (%)</th>
                    <th scope="col">Net Worth ($)</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($balances as $key => $value): ?>
                <tr>
                    <td><a href="/balances/edit/<?= $value->id ?>">Edit</a> | <a class="text-danger" href="/balances/delete/<?= $value->id ?>">Delete</a></td>
                    <td><?= $value->month->month ?> <?= $value->month->year ?></td>
                    <td><?= number_format($value->asset, 2, '.', ',') ?></td>
                    <td><?= number_format($value->liability, 2, '.', ',') ?></td>
                    <td><?= number_format($value->liability / $value->asset * 100, 2, '.', ',') ?>%</td>
                    <td><strong><?= number_format($value->asset - $value->liability, 2, '.', ',') ?></strong></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="/balances/add">Add a new balance record</a>
    </div>

</body>
</html>
@endsection