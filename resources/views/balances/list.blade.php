@extends('layouts.layout')

@section('title', 'Step 2: Balances (Asset & Liability)')

@section('content')

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
        <div>
            <a href="/balances/add">Add a new balance record</a>
        </div>
        <div class="my-3">
            <a class="btn btn-primary" href="/months/list">&laquo; Back to step 1</a> <a class="btn btn-primary" href="/flows/list">On to step 3 &raquo;</a>
        </div>
    </div>

</body>
</html>
@endsection