<?php

namespace App\Http\Controllers;

use App\Models\Shift;

class BreakController extends Controller
{
    public function index()
    {
        $shifts = Shift::with('employee', 'breakPeriod')
            ->whereDate('start_time', today())
            ->orderBy('start_time')
            ->get();

        $next = $shifts->first(function ($shift) {
            return !$shift->breakPeriod || $shift->breakPeriod->status === 'pending';
        });

        return view('breaks.index', compact('shifts', 'next'));
    }

    public function confirm(Shift $shift)
    {
        $break = $shift->breakPeriod()->firstOrNew();
        $break->start_time = now();
        $break->end_time = now()->addMinutes($shift->breakMinutes());
        $break->status = 'confirmed';
        $break->save();

        return back();
    }

    public function reject(Shift $shift)
    {
        $break = $shift->breakPeriod()->firstOrNew();
        $break->status = 'rejected';
        $break->save();

        return back();
    }
}

