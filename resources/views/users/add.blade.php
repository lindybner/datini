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
                <input type="text" name="username" id="username">
            </div>

            <?php if($errors->first('username')): ?>
                <span class="text-danger"><?= $errors->first('username') ?></span>
                <br>
            <?php endif; ?>
            
            <div class="my-3">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>

            <?php if($errors->first('password')): ?>
                <span class="text-danger"><?= $errors->first('password') ?></span>
                <br>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary my-3">Create User</button>
        </form>


        <a href="/users/list">Back to Users</a>
    </div>

</body>
</html>
@endsection