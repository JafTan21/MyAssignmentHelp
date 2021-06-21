<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'question_category_id',
        'others',
    ];

    public function questionCategory()
    {
        return $this->belongsTo(QuestionCategory::class);
    }

    public function answer()
    {
        return $this->hasOne(Answer::class);
    }
}
