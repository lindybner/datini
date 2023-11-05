@extends('layouts.layout')

@section('title', 'Manage Users')

@section('content')
        <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 m-5">
            <h1>
                Manage Users
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
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Admin</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($users as $key => $value): ?>

                <tr>
                    <td><a href="/users/edit/<?= $value->id ?>">Edit</a> | <a class="text-danger" href="/users/delete/<?= $value->id ?>">Delete</a></td>
                    <td><?= $value->id ?></td>
                    <td><?= $value->username ?></td>
                    <td><?= $value->is_admin ?></td>
                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="/users/add">Add a new user</a>
    </div>

</body>
</html>
@endsection