@extends('layouts.layout')

@section('title', 'Edit a balance')

@section('content')

        <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 m-5">
            <h1>
                Edit a balance
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
        <form action="/balances/edit/<?= $balance->id ?>" method="POST" novalidate>
            <?= csrf_field() ?>

            <div class="my-3">
                <label for="month_id">Month:</label>
                <select name="month_id" id="month_id" class="form-select">
                    @foreach($months as $month)
                        <option value="{{ $month->id }}">{{ $month->month }} {{ $month->year }}</option>
                    @endforeach
                </select>
            </div>

            <div class="my-3">
                <label for="asset">Asset:</label>
                <input type="number" name="asset" id="asset" value="<?= old('asset', $balance->asset) ?>">
            </div>

            <?php if($errors->first('asset')): ?>
                <span class="text-danger"><?= $errors->first('asset') ?></span>
                <br>
            <?php endif; ?>
            
            <div class="my-3">
                <label for="liability">Liability:</label>
                <input type="number" name="liability" id="liability" value="<?= old('liability', $balance->liability) ?>">
            </div>

            <?php if($errors->first('liability')): ?>
                <span class="text-danger"><?= $errors->first('liability') ?></span>
                <br>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary my-3">Edit Balance</button>
        </form>


        <a href="/balances/list">Back to Balances</a>
    </div>

</body>
</html>
@endsection