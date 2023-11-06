@extends('layouts.layout')

@section('title', 'Cash Flows')

@section('content')

        <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 m-5">
            <h1>
                Cash Flows
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
                    <th scope="col">Inflow ($)</th>
                    <th scope="col">Outflow ($)</th>
                    <th scope="col">Savings Rate (%)</th>
                    <th scope="col">Savings ($)</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($flows as $key => $value): ?>
                <tr>
                    <td><a href="/flows/edit/<?= $value->id ?>">Edit</a> | <a class="text-danger" href="/flows/delete/<?= $value->id ?>">Delete</a></td>
                    <td><?= $value->month->month ?> <?= $value->month->year ?></td>
                    <td><?= number_format($value->inflow, 2, '.', ',') ?></td>
                    <td><?= number_format($value->outflow, 2, '.', ',') ?></td>
                    <td><?= number_format(($value->inflow - $value->outflow) / $value->inflow * 100, 2, '.', ',') ?>%</td>
                    <td><strong><?= number_format($value->inflow - $value->outflow, 2, '.', ',') ?></strong></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="/flows/add">Add a new cash flow record</a>

        <div class="my-3">
            <a class="btn btn-primary" href="/balances/list">&laquo; Back to step 2</a>
        </div>
    </div>

</body>
</html>
@endsection