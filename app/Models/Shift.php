<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BreakRule;
use App\Models\BreakPeriod;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function breakPeriods()
    {
        return $this->hasMany(BreakPeriod::class);
    }

    public function breakMinutes(): int
    {
        $hours = $this->start_time->diffInMinutes($this->end_time) / 60;
        $rule = BreakRule::forHours($hours);
        return $rule?->break_minutes ?? 0;
    }
}
