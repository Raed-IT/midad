<?php

namespace Database\Seeders;

use App\Models\Lang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lang::create([
            "code" => "en",
            "name" => "English",
            "is_active" => true,
        ]);
        Lang::create([
            "code" => "ar",
            "name" => "عربية",
            "is_active" => true,
        ]);
    }
}
