<?php

namespace App\Http\Controllers;

use App\Models\Flow;
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
}
