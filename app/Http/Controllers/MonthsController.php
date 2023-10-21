<?php

namespace App\Http\Controllers;

use App\Models\Month;
use Illuminate\Http\Request;

class MonthsController extends Controller
{
    //

    public function list()
    {
        return view('month', [
            'months' => Month::all()
        ]);
    }
}
