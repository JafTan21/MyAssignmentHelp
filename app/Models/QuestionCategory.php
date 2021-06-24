<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class QuestionCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'has_static_page'
    ];

    public function questions()
    {
        // return Question::where('question_category_id', $this->id);
        return $this->hasMany(Question::class);
    }


    public function getStaticPageExistsAttribute()
    {
        return Storage::disk('public_htmls')->exists('question-category/' . $this->slug . '.html');
    }
}
