<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreakPeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'shift_id',
        'start_time',
        'end_time',
        'status',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
