<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            ServiceCategorySeeder::class,
            ServiceSubCategorySeeder::class,
            ServiceSeeder::class,
            QuestionCategorySeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
        ]);
    }
}
