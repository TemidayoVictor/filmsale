<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Revenue;

class RevenueController extends Controller
{
    //
    public function index() {
        $revenues = Revenue::all();
        return view('admin.revenue', [
            'upperNav' => 'nil',
            'sideNav' => 'revenue',
            'revenues' => $revenues,
        ]);
    }

    public function addBatch(Request $request) {
        $this->validate($request, [
            'batch' => 'required',
        ]);

        $update = Revenue::where('status', 'current')
        ->update([
            'status' => 'completed',
        ]);

        Revenue::create([
            'title' => $request->batch,
            'start' => 'null',
            'end' => 'null',
            'amount' => 0,
            'status' => 'current',
            'user' => 'null',
        ]);

        return back()->with('message', 'New Batch Initialized.');
    }
}
