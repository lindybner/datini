<?php

namespace App\Http\Controllers;

use App\Models\Flow;
use App\Models\Month;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FlowsController extends Controller
{
    //

    public function list()
    {
        $user = Auth::user();
        $flows = Flow::where('user_id', $user->id)->get();
        return view('flows.list', compact('flows'));
    }

    public function delete(Flow $flow)
    {
        $flow->delete();

        return redirect('/flows/list')
            ->with('message', 'Cash flow record deleted');
    }

    public function addForm()
    {
        $user = auth()->user();
        $months = $user->months ?? collect(); // Use the null coalescing operator to handle null value
        return view('flows.add', compact('months'));
    }


    public function add()
    {
        $user = auth()->user(); // Get the currently authenticated user

        $attributes = request()->validate([
            'month_id' => 'required',
            'inflow' => 'required',
            'outflow' => 'required',
        ]);

        // Check if the selected month belongs to the authenticated user
        if ($user->months->contains('id', $attributes['month_id'])) {
            // Create a new Flow instance and associate it with the user ID and month ID
            $flow = new Flow([
                'month_id' => $attributes['month_id'],
                'inflow' => $attributes['inflow'],
                'outflow' => $attributes['outflow'],
                'user_id' => $user->id,
            ]);

            $flow->save(); // Save the flow record

            return redirect('/flows/list')->with('message', 'New cash flow added.');
        } else {
            // Handle the case where the selected month does not belong to the authenticated user
            return redirect('/flows/add')->withErrors(['month_id' => 'Invalid month selected.']);
        }
    }


    public function editForm(Flow $flow)
    {
        $user = auth()->user();
        $months = $user->months;
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
