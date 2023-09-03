<?php

namespace Database\Seeders;

use App\Models\Study;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Study::create([
            "user_id" => 1,
            "start_at" => now(),
            "end_at" => now()->addHour(),
            "title" => fake()->title,
            "course_id" => 1,
            "description" => fake()->paragraph,
        ]);
    }
}
