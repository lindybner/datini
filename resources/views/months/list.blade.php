@extends('layouts.layout')

@section('title', 'Step 1: Overview & Months (Set the Time Period)')

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
                    <th scope="col">Year</th>
                    <th scope="col">Net Worth ($)</th>
                    <th scope="col">Savings ($)</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($months as $key => $value): ?>
                <tr>
                    <td><a href="/months/edit/<?= $value->id ?>">Edit</a> | <a class="text-danger" href="/months/delete/<?= $value->id ?>">Delete</a></td>
                    <td><?= $value->month ?></td>
                    <td><?= $value->year ?></td>
                    <!-- Display balance data if available -->
                    <?php if($value->balance): ?>
                        <td><?= number_format($value->balance->asset - $value->balance->liability, 2, '.', ',') ?></td>
                    <?php else: ?>
                        <!-- If no balance data is available, display "N/A" -->
                        <td>N/A</td>
                    <?php endif; ?>
                    <!-- Display flow data if available -->
                    <?php if($value->flow): ?>
                        <td><?= number_format($value->flow->inflow - $value->flow->outflow, 2, '.', ',') ?></td>
                    <?php else: ?>
                        <!-- If no flow data is available, display "N/A" -->
                        <td>N/A</td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div>
            <a href="/months/add">Add a new month</a>
        </div>
        <div class="my-3">
            <a class="btn btn-primary" href="/balances/list">On to step 2 &raquo;</a>
        </div>
    </div>

</body>
</html>
@endsection