<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SessionDetail>
 */
class SessionDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "trainer_id" => User::factory(),
            "subject_id" => Subject::factory(),
            "group_id" => Group::factory(),
        ];
    }
}
