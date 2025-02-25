<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Group;
use App\Models\Major;
use App\Models\SchoolYear;
use App\Models\SessionDetail;
use App\Models\SessionEvent;
use App\Models\Subject;
use App\Models\Timetable;
use App\Models\User;
use Database\Factories\GroupFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Classroom::factory(10)->create();
        User::factory(10)->create();
        Major::factory(6)
            ->has(
                Group::factory(10)
                    ->for(SchoolYear::factory())
            )
            ->has(
                Timetable::factory(20)
            )
            ->has(
                Subject::factory(10)

            )
            ->create();
    }
}
