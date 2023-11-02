<?php

namespace App\Http\Controllers;

use App\Models\Balance;
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
        return view('balances.add');
    }

    public function add()
    {
        $attributes = request()->validate([
            'month' => 'required',
            'year' => 'required',
        ]);

        $month = new Month();
        $month->month = $attributes['month'];
        $month->year = $attributes['year'];
        $month->save();

        return redirect('/months/list')
            ->with('message', 'New month added.');
    }
}
