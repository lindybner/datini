<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonthsController extends Controller
{
    //

    public function list()
    {
        return view('overview');
    }
}
