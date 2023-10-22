<?php

namespace App\Http\Controllers;

use App\Models\Month;
use Illuminate\Http\Request;

class MonthsController extends Controller
{
    //

    public function list()
    {
        return view('months.list', [
            'months' => Month::all()
        ]);
    }

    public function delete(Month $month)
    {
        $month->delete();

        return redirect('/months/list')
            ->with('message', 'Month record deleted');
    }
}
