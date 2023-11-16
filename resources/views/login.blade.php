@extends('layouts.layout')

@section('title', 'Login')

@section('content')

    <section class="p-3 m-5 border border-primary-subtle rounded-3">
        
        <form action="/login" method="post" novalidation>
        
            <?= csrf_field() ?>

            <div class="mb-3">
                <div><label for="username">Username:</label></div>
                <div>
                    <input type="text" name="username" id="username" placeholder="username" value="<?= old('username') ?>">
                    <?php if($errors->first('username')): ?>
                        <span class="text-danger"><?= $errors->first('username'); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mb-3">
                <div><label for="password">Password:</label></div>
                <div>
                    <input type="password" name="password" id="password" placeholder="password">
                    <?php if($errors->first('password')): ?>
                        <span class="text-danger"><?= $errors->first('password'); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-primary btn-lg">Log In</button>

        </form>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
@endsection