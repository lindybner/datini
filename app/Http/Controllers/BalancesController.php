<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Month;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BalancesController extends Controller
{
    //

    public function list()
    {
        $user = Auth::user();
        $balances = Balance::where('user_id', $user->id)->get();
        return view('balances.list', compact('balances'));
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

    public function editForm(Balance $balance)
    {
        $months = Month::all();
        return view('balances.edit', compact('balance', 'months'));
    }

    public function edit(Balance $balance)
    {
        $attributes = request()->validate([
            'month_id' => 'required',
            'asset' => 'required',
            'liability' => 'required',
        ]);


        $balance->month_id = $attributes['month_id'];
        $balance->asset = $attributes['asset'];
        $balance->liability = $attributes['liability'];
        $balance->save();

        return redirect('/balances/list')
            ->with('message', 'Balance edited.');
    }
}
