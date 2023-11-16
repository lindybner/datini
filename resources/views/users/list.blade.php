@extends('layouts.layout')

@section('title', 'Manage Users')

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
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password (Encrypted)</th>
                    <th scope="col">Admin</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($users as $key => $value): ?>

                <tr>
                    <td><a href="/users/edit/<?= $value->id ?>">Edit</a> | <a class="text-danger" href="/users/delete/<?= $value->id ?>">Delete</a></td>
                    <td><?= $value->id ?></td>
                    <td><?= $value->username ?></td>
                    <td><?= $value->password ?></td>
                    <td>{{ $value->is_admin ? 'Yes' : 'No' }}</td>
                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="/users/add">Add a new user</a>
    </div>

</body>
</html>
@endsection