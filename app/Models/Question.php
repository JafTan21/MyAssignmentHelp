<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Inline\Element\Strong;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'question_category_id',
        'others',
        'has_static_page'
    ];

    public function questionCategory()
    {
        return $this->belongsTo(QuestionCategory::class);
    }

    public function answer()
    {
        return $this->hasOne(Answer::class);
    }

    public function getStaticPageExistsAttribute()
    {
        return Storage::disk('public_htmls')->exists('question/' . $this->slug . '.html');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($question) {
            if ($question->answer) {
                $question->answer->delete();
            }
        });
    }
}
