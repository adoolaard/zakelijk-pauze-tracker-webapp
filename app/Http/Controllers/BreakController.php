<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\BusyPeriod;

class BreakController extends Controller
{
    public function index()
    {
        $shifts = Shift::with('employee', 'breakPeriods')
            ->whereDate('start_time', today())
            ->orderBy('start_time')
            ->get();
        $busy = BusyPeriod::current();

        $next = null;
        if (!$busy) {
            $next = $shifts->first(function ($shift) {
                return $shift->breakPeriods()->where('status', 'confirmed')->doesntExist();
            });
        }

        return view('breaks.index', compact('shifts', 'next', 'busy'));
    }

    public function confirm(Shift $shift)
    {
        if (BusyPeriod::current()) {
            return back()->withErrors('Druk moment: geen pauze mogelijk.');
        }

        $shift->breakPeriods()->create([
            'start_time' => now(),
            'end_time' => now()->addMinutes($shift->breakMinutes()),
            'status' => 'confirmed',
        ]);

        return back();
    }

    public function reject(Shift $shift)
    {
        $shift->breakPeriods()->create([
            'status' => 'rejected',
        ]);

        return back();
    }
}

