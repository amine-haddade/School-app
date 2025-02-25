<?php

namespace Database\Factories;

use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $total = $this->faker->randomElement([20, 30, 40, 50, 60, 70, 80, 90, 100]);
        $presentiel = $total * 80 / 100;
        $distance = $total - $presentiel;
        return [
            "name" => $this->faker->unique()->word(),
            "total_hourly_mass" => $total,
            "mass_time_presentiel" => $presentiel,
            "mass_time_distance" => $distance,
            "major_id" => Major::factory(),
        ];
    }
}
