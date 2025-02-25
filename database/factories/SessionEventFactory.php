<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SessionEvent>
 */
class SessionEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = $this->faker->randomElement([1, 2, 3, 4]);
        $length = in_array($start, [2, 4]) ? 1 : $this->faker->randomElement([1, 2]);
        return [
            "day" => $this->faker->randomElement(["monday", "tuesday", "wednesday", "thursday", "friday", "saturday"]),
            "start" => $start,
            "length" => $length,
            "classroom_id" => $this->faker->time(),
            "details_id" => $this->faker->time(),
            "timetable_id" => $this->faker->time(),

        ];
    }
}
