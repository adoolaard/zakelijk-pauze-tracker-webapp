<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\Employee;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::with('employee', 'breakPeriod')
            ->orderBy('start_time')
            ->get();
        return view('shifts.index', compact('shifts'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('shifts.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $shift = Shift::create($data);
        $shift->breakPeriod()->create();

        return redirect()->route('shifts.index');
    }

    public function destroy(Shift $shift)
    {
        $shift->delete();
        return redirect()->route('shifts.index');
    }
}
