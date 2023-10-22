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

    public function addForm()
    {
        return view('months.add');
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
