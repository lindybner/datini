@extends('layouts.layout')

@section('title', 'Edit a month')

@section('content')

    <div class="container">
        <h2>Edit: <?= $month->month ?> <?= $month->year ?></h2>
        <form action="/months/edit/<?= $month->id ?>" method="POST" novalidate>
            <?= csrf_field() ?>

            <div class="my-3">
                <label for="month">Month:</label>
                <input type="text" name="month" id="month" required value="<?= old('month', $month->month) ?>">
            </div>

            <?php if($errors->first('month')): ?>
                <span class="text-danger"><?= $errors->first('month') ?></span>
                <br>
            <?php endif; ?>
            
            <div class="my-3">
                <label for="year">Year:</label>
                <input type="text" name="year" id="year" required value="<?= old('month', $month->year) ?>">
            </div>

            <?php if($errors->first('year')): ?>
                <span class="text-danger"><?= $errors->first('year') ?></span>
                <br>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary my-3">Edit Month</button>
        </form>


        <a href="/months/list">Back to Months</a>
    </div>

</body>
</html>
@endsection