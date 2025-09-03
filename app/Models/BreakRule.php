<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreakRule extends Model
{
    use HasFactory;

    protected $fillable = [
        'min_hours',
        'max_hours',
        'break_minutes',
    ];

    public static function forHours(float $hours): ?self
    {
        return static::where('min_hours', '<=', $hours)
            ->where(function ($query) use ($hours) {
                $query->where('max_hours', '>', $hours)
                    ->orWhereNull('max_hours');
            })
            ->orderByDesc('min_hours')
            ->first();
    }
}
