<?php

namespace Database\Factories;

use App\Models\Major;
use App\Models\SchoolYear;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => 'grp ' .$this->faker->numberBetween(1, 20),
            "major_id" => Major::factory(),
            "year_id" => SchoolYear::factory(),
        ];
    }
}
