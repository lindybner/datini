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

        $flow = new Flow();
        $flow->month_id = $attributes['month_id'];
        $flow->inflow = $attributes['inflow'];
        $flow->outflow = $attributes['outflow'];
        $flow->save();

        return redirect('/flows/list')
            ->with('message', 'New cash flow added.');
    }

    public function editForm(Flow $flow)
    {
        $months = Month::all();
        return view('flows.edit', compact('flow', 'months'));
    }

    public function edit(Flow $flow)
    {
        $attributes = request()->validate([
            'month_id' => 'required',
            'inflow' => 'required',
            'outflow' => 'required',
        ]);

        $flow->month_id = $attributes['month_id'];
        $flow->inflow = $attributes['inflow'];
        $flow->outflow = $attributes['outflow'];
        $flow->save();

        return redirect('/flows/list')
            ->with('message', 'Cash flow edited.');
    }
}
