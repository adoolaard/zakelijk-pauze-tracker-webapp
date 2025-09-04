<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\BusyPeriod;
use Illuminate\Http\Request;

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
                return $shift->remainingBreakMinutes() > 0;
            });
        }

        return view('breaks.index', compact('shifts', 'next', 'busy'));
    }

    public function confirm(Request $request, Shift $shift)
    {
        if (BusyPeriod::current()) {
            return back()->withErrors('Druk moment: geen pauze mogelijk.');
        }

        $minutes = (int) $request->input('minutes', $shift->nextBreakSuggestion());
        $minutes = min($minutes, $shift->remainingBreakMinutes());
        if ($minutes <= 0) {
            return back();
        }

        $shift->breakPeriods()->create([
            'start_time' => now(),
            'end_time' => now()->addMinutes($minutes),
            'status' => 'confirmed',
        ]);

        return back();
    }

    public function bulkConfirm(Request $request)
    {
        if (BusyPeriod::current()) {
            return back()->withErrors('Druk moment: geen pauze mogelijk.');
        }

        $data = $request->validate([
            'shift_ids' => 'required|array',
            'shift_ids.*' => 'exists:shifts,id',
            'minutes' => 'required|integer|min:1',
        ]);

        foreach ($data['shift_ids'] as $id) {
            $shift = Shift::find($id);
            $minutes = min($data['minutes'], $shift->remainingBreakMinutes());
            if ($minutes > 0) {
                $shift->breakPeriods()->create([
                    'start_time' => now(),
                    'end_time' => now()->addMinutes($minutes),
                    'status' => 'confirmed',
                ]);
            }
        }

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

