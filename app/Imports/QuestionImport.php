<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $slug = Str::slug($row['course_title'], '-');
        $next = 2;


        while (Question::where('slug', '=', $slug)->first()) {
            $slug = $slug . '-' . $next;
            $next++;
        }

        return new Question([
            'title'=> $row['course_title'],
            'slug'=> $slug,
            'description'=>$row['question_text'],
            'question_category_id'=>1,
            'has_static_page'=>false,
        ]);
    }
}
