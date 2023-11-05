@extends('layouts.layout')

@section('title', 'Add a new user')

@section('content')
        <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 m-5">
            <h1>
                Add a new user
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
        <form action="/users/add" method="POST" novalidate>
            <?= csrf_field() ?>

            <div class="my-3">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?= old('username') ?>">
            </div>

            <?php if($errors->first('username')): ?>
                <span class="text-danger"><?= $errors->first('username') ?></span>
                <br>
            <?php endif; ?>
            
            <div class="my-3">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="<?= old('password') ?>">
            </div>

            <?php if($errors->first('password')): ?>
                <span class="text-danger"><?= $errors->first('password') ?></span>
                <br>
            <?php endif; ?>

            <div class="my-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" value="1">
                <label class="form-check-label" for="is_admin">Is Admin</label>
            </div>

            <button type="submit" class="btn btn-primary my-3">Create User</button>
        </form>


        <a href="/users/list">Back to Manage Users</a>
    </div>

</body>
</html>
@endsection