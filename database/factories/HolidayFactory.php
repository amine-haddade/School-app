<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Holiday>
 */
class HolidayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $number = $this->faker->numberBetween(1, 20);
        $start = $this->faker->dateTime();
        $end = (clone $start)->modify("+$number day");
        return [
            "name" => 'holiday ' . $this->faker->randomDigitNotZero(),
            "start_date" => $start->format('Y-m-d'),
            "end_date" => $end->format('Y-m-d'),
        ];
    }
}
