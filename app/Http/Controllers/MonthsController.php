<?php

namespace App\Http\Controllers;

use App\Models\Month;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MonthsController extends Controller
{
    //

    public function list()
    {
        $user = Auth::user();
        $months = Month::where('user_id', $user->id)->get();
        return view('months.list', compact('months'));
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
        $user = Auth::user(); // Get the currently authenticated user

        $attributes = request()->validate([
            'month' => 'required',
            'year' => 'required',
        ]);

        // Create a new Month instance and associate it with the user ID
        $month = new Month([
            'month' => $attributes['month'],
            'year' => $attributes['year'],
            'user_id' => $user->id,
        ]);

        $month->save(); // Save the month record

        return redirect('/months/list')->with('message', 'New month added.');
    }

    public function editForm(Month $month)
    {
        return view('months.edit', [
            'month' => $month,
        ]);
    }

    public function edit(Month $month)
    {
        $attributes = request()->validate([
            'month' => 'required',
            'year' => 'required',
        ]);


        $month->month = $attributes['month'];
        $month->year = $attributes['year'];
        $month->save();

        return redirect('/months/list')
            ->with('message', 'Month edited.');
    }
}
