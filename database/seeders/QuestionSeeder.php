<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            'title' => 'First question',
            'slug' => 'first-question',
            'question_category_id' => '1',
        ]);

        Question::create([
            'title' => 'Second question',
            'slug' => 'second-question',
            'question_category_id' => '2',
        ]);

        Question::create([
            'title' => 'Third question',
            'slug' => 'third-question',
            'question_category_id' => '3',
        ]);
    }
}
