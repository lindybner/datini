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
}
