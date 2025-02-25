<?php

namespace Database\Factories;

use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timetable>
 */
class TimetableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = $this->faker->dateTimeThisYear();
        $start = (clone $date)->modify('monday this week');
        $end = (clone $date)->modify('sunday this week');

        return [
            "name" => $this->faker->unique()->words(2, true),
            "major_id" => Major::factory(),
            "start_date" => $start->format('Y-m-d'),
            "end_date" => $end->format('Y-m-d'),
        ];
    }
}
