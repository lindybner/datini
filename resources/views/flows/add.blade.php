@extends('layouts.layout')

@section('title', 'Add a new cash flow')

@section('content')

    <div class="container">
        <form action="/flows/add" method="POST" novalidate>
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
                <label for="inflow">Inflow:</label>
                <input type="number" name="inflow" id="inflow">
            </div>

            <?php if($errors->first('inflow')): ?>
                <span class="text-danger"><?= $errors->first('inflow') ?></span>
                <br>
            <?php endif; ?>
            
            <div class="my-3">
                <label for="outflow">Outflow:</label>
                <input type="number" name="outflow" id="outflow">
            </div>

            <?php if($errors->first('outflow')): ?>
                <span class="text-danger"><?= $errors->first('outflow') ?></span>
                <br>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary my-3">Add Cash Flow</button>
        </form>


        <a href="/flows/list">Back to Cash Flows</a>
    </div>

</body>
</html>
@endsection