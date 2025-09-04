<?php

namespace App\Http\Controllers;

use App\Models\BusyPeriod;
use Illuminate\Http\Request;

class BusyPeriodController extends Controller
{
    public function index()
    {
        $periods = BusyPeriod::orderBy('start_time')->get();
        return view('busy_periods.index', compact('periods'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);
        BusyPeriod::create($data);
        return redirect()->route('busy-periods.index');
    }

    public function destroy(BusyPeriod $busy_period)
    {
        $busy_period->delete();
        return redirect()->route('busy-periods.index');
    }
}
