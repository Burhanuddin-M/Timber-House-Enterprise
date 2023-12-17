<?php

namespace Database\Factories;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $has_extra_time = fake()->randomElement([1, 0]);
        $extra_hours = 0;
        $total_amount = 0;
        if ($has_extra_time) {
            $extra_hours = fake()->numberBetween(1, 4);
            $total_amount = fake()->numberBetween(10, 1000);
        }
        return [
            'type' => fake()->randomElement([Attendance::ABSENT, Attendance::PRESENT]),
            'has_extra_time' => $has_extra_time,
            'extra_hours' => $extra_hours,
            'total_amount' => $total_amount,
        ];
    }
}
