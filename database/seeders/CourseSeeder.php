<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            "duration" => 50,
            "price" => 100,
            "title" => [
                "ar" => "كورس لارافيل",
                "en" => "Laravel Course"
            ],
            "description" => [
                "ar" => "الوصف",
                "en" => "description"
            ],
        ]);
    }
}
