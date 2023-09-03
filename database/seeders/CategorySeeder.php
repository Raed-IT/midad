<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "name" => [
                "ar" => 'برمجة',
                "en" => 'Programing',
            ],
        ]);
        Category::create([
            "name" => [
                "ar" => 'تصميم',
                "en" => 'Design',
            ],
        ]);
        Category::create([
            "name" => [
                "ar" => 'تسويق',
                "en" => 'Marketing',
            ],
        ]);
    }
}
