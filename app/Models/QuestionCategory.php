<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug',
    ];

    public function questions()
    {
        // return Question::where('question_category_id', $this->id);
        return $this->hasMany(Question::class);
    }
}
