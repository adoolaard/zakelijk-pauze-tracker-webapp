<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BreakRule;

class BreakRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rules = [
            ['min_hours' => 3.5, 'max_hours' => 5, 'break_minutes' => 30],
            ['min_hours' => 5, 'max_hours' => 8, 'break_minutes' => 45],
            ['min_hours' => 8, 'max_hours' => null, 'break_minutes' => 90],
        ];

        foreach ($rules as $rule) {
            BreakRule::create($rule);
        }
    }
}
