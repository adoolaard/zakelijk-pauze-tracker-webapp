<?php

namespace App\Http\Controllers;

use App\Models\BreakRule;
use Illuminate\Http\Request;

class BreakRuleController extends Controller
{
    public function index()
    {
        $rules = BreakRule::all();
        return view('break_rules.index', compact('rules'));
    }

    public function edit(BreakRule $break_rule)
    {
        return view('break_rules.edit', compact('break_rule'));
    }

    public function update(Request $request, BreakRule $break_rule)
    {
        $data = $request->validate([
            'min_hours' => 'required|numeric',
            'max_hours' => 'nullable|numeric',
            'break_minutes' => 'required|integer',
        ]);
        $break_rule->update($data);
        return redirect()->route('break-rules.index');
    }
}
