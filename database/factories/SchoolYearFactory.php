<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolYear>
 */
class SchoolYearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $year = $this->faker->unique()->numberBetween(2020, 2030);
        return [
            "id" => "$year/" . ($year + 1),
            "start_date" => "$year-09-01",
            "end_date" => ($year + 1) . "-05-31",
        ];
    }
}
