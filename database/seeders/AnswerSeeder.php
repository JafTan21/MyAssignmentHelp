<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answer::create([
            'question_id' => 1,
            'answer' => 'Some fake answer 1'
        ]);

        Answer::create([
            'question_id' => 2,
            'answer' => 'Some fake answer 2'
        ]);

        Answer::create([
            'question_id' => 3,
            'answer' => 'Some fake answer 3'
        ]);
    }
}
