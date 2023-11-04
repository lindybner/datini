<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Month;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BalancesController extends Controller
{
    //

    public function list()
    {
        $user = Auth::user();
        $balances = Balance::where('user_id', $user->id)->get();
        return view('balances.list', compact('balances'));
    }

    public function delete(Balance $balance)
    {
        $balance->delete();

        return redirect('/balances/list')
            ->with('message', 'Balance record deleted');
    }

    public function addForm()
    {
        $user = auth()->user();
        $months = $user->months ?? collect(); // Use the null coalescing operator to handle null value
        return view('balances.add', compact('months'));
    }


    public function add()
    {
        $user = auth()->user(); // Get the currently authenticated user

        $attributes = request()->validate([
            'month_id' => 'required',
            'asset' => 'required',
            'liability' => 'required',
        ]);

        // Check if the selected month belongs to the authenticated user
        if ($user->months->contains('id', $attributes['month_id'])) {
            // Create a new Balance instance and associate it with the user ID and month ID
            $balance = new Balance([
                'month_id' => $attributes['month_id'],
                'asset' => $attributes['asset'],
                'liability' => $attributes['liability'],
                'user_id' => $user->id,
            ]);

            $balance->save(); // Save the balance record

            return redirect('/balances/list')->with('message', 'New balance added.');
        } else {
            // Handle the case where the selected month does not belong to the authenticated user
            return redirect('/balances/add')->withErrors(['month_id' => 'Invalid month selected.']);
        }
    }


    public function editForm(Balance $balance)
    {
        $user = auth()->user();
        $months = $user->months;
        return view('balances.edit', compact('balance', 'months'));
    }

    public function edit(Balance $balance)
    {
        $attributes = request()->validate([
            'month_id' => 'required',
            'asset' => 'required',
            'liability' => 'required',
        ]);


        $balance->month_id = $attributes['month_id'];
        $balance->asset = $attributes['asset'];
        $balance->liability = $attributes['liability'];
        $balance->save();

        return redirect('/balances/list')
            ->with('message', 'Balance edited.');
    }
}
