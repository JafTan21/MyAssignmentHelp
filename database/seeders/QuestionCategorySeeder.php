<?php

namespace Database\Seeders;

use App\Models\QuestionCategory;
use Illuminate\Database\Seeder;

class QuestionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionCategory::create([
            'name' => 'Q-Category-1',
            'slug' => 'Q-Category-1',
        ]);

        QuestionCategory::create([
            'name' => 'Q-Category-2',
            'slug' => 'Q-Category-2',
        ]);

        QuestionCategory::create([
            'name' => 'Q-Category-3',
            'slug' => 'Q-Category-3',
        ]);
    }
}
