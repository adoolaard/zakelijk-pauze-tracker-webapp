<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Shift;
use App\Models\BreakPeriod;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);
        $employee = Employee::create(['name' => $data['name']]);
        $employee->shifts()->create([
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ]);
        return redirect()->route('employees.index');
    }

    public function show(Employee $employee)
    {
        $shifts = $employee->shifts()->with('breakPeriods')->orderByDesc('start_time')->get();
        return view('employees.show', compact('employee', 'shifts'));
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }

    public function destroyAll()
    {
        BreakPeriod::truncate();
        Shift::truncate();
        Employee::truncate();
        return redirect()->route('employees.index');
    }
}
