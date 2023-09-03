<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\GenderEnum;
use App\Enums\UserTypeEnum;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void

    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $admin = User::create([
            "name" => "Admin",
            "email" => "admin@admin.com",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "gender" => GenderEnum::MALE->value,
//            "type" => UserTypeEnum::SUPERVISOR->value,
        ]);
        foreach (UserTypeEnum::cases() as $type) {
            $role = Role::create([
                "name" => $type->value,
                "guard_name" => "web"
            ]);
            if ($type->value == UserTypeEnum::SUPERVISOR->value) {
                $role->syncPermissions(Permission::all()->pluck("name")->toArray());
            }
        }
        $admin->assignRole(Role::all()->pluck("name"));
        User::create([
            "name" => "Raed ",
            "email" => "Raed@admin.com",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "gender" => GenderEnum::MALE->value,
//            "type" => UserTypeEnum::STUDENT->value,
        ]);
        $this->call([
            CourseSeeder::class,
            LangSeeder::class,
            CategorySeeder::class,
            StudySeeder::class,
            TaskSeeder::class,
        ]);
    }
}
