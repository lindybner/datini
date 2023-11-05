@extends('layouts.layout')

@section('title', 'Edit User')

@section('content')
        <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 m-5">
            <h1>
                Edit user
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
        <form action="/users/edit/<?= $user->id ?>" method="POST" novalidate>
            <?= csrf_field() ?>

            <div class="my-3">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?= old('username', $user->username) ?>">
            </div>

            <?php if($errors->first('username')): ?>
                <span class="text-danger"><?= $errors->first('username') ?></span>
                <br>
            <?php endif; ?>
            
            <div class="my-3">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="<?= old('password', $user->password) ?>">
            </div>

            <?php if($errors->first('password')): ?>
                <span class="text-danger"><?= $errors->first('password') ?></span>
                <br>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary my-3">Edit User</button>
        </form>


        <a href="/users/list">Back to Manage Users</a>
    </div>

</body>
</html>
@endsection