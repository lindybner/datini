<?php

namespace App\Http\Controllers;

use App\Models\Flow;
use App\Models\Month;
use Illuminate\Http\Request;

class FlowsController extends Controller
{
    //

    public function list()
    {
        return view('flows.list', [
            'flows' => Flow::all()
        ]);
    }

    public function delete(Flow $flow)
    {
        $flow->delete();

        return redirect('/flows/list')
            ->with('message', 'Cash flow record deleted');
    }

    public function addForm()
    {
        $months = Month::all();
        return view('flows.add', compact('months'));
    }

    public function add()
    {
        $attributes = request()->validate([
            'month_id' => 'required',
            'inflow' => 'required',
            'outflow' => 'required',
        ]);

        $balance = new Flow();
        $balance->month_id = $attributes['month_id'];
        $balance->inflow = $attributes['inflow'];
        $balance->outflow = $attributes['outflow'];
        $balance->save();

        return redirect('/flows/list')
            ->with('message', 'New cash flow added.');
    }
}
