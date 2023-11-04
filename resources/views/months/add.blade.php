@extends('layouts.layout')

@section('title', 'Add a new month')

@section('content')
        <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 m-5">
            <h1>
                Add a new month
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
        <form action="/months/add" method="POST" novalidate>
            <?= csrf_field() ?>

            <div class="my-3">
                <label for="month">Month:</label>
                <input type="text" name="month" id="month">
            </div>

            <?php if($errors->first('month')): ?>
                <span class="text-danger"><?= $errors->first('month') ?></span>
                <br>
            <?php endif; ?>
            
            <div class="my-3">
                <label for="year">Year:</label>
                <input type="text" name="year" id="year">
            </div>

            <?php if($errors->first('year')): ?>
                <span class="text-danger"><?= $errors->first('year') ?></span>
                <br>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary my-3">Add Month</button>
        </form>


        <a href="/months/list">Back to Months</a>
    </div>

</body>
</html>
@endsection