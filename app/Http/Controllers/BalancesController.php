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
}
