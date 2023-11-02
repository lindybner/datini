<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Month;
use Illuminate\Http\Request;

class BalancesController extends Controller
{
    //

    public function list()
    {
        return view('balances.list', [
            'balances' => Balance::all()
        ]);
    }

    public function delete(Balance $balance)
    {
        $balance->delete();

        return redirect('/balances/list')
            ->with('message', 'Balance record deleted');
    }

    public function addForm()
    {
        $months = Month::all();
        return view('balances.add', compact('months'));
    }

    public function add()
    {
        $attributes = request()->validate([
            'month_id' => 'required',
            'asset' => 'required',
            'liability' => 'required',
        ]);

        $balance = new Balance();
        $balance->month_id = $attributes['month_id'];
        $balance->asset = $attributes['asset'];
        $balance->liability = $attributes['liability'];
        $balance->save();

        return redirect('/balances/list')
            ->with('message', 'New balance added.');
    }

    public function editForm(Month $month)
    {
        return view('months.edit', [
            'month' => $month,
        ]);
    }

    public function edit(Month $month)
    {
        $attributes = request()->validate([
            'month' => 'required',
            'year' => 'required',
        ]);


        $month->month = $attributes['month'];
        $month->year = $attributes['year'];
        $month->save();

        return redirect('/months/list')
            ->with('message', 'Month edited.');
    }
}
