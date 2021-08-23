<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'service_category_id',
        'slug',
        'has_static_page'
    ];


    public function mainCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function pages()
    {
        return Page::where('main_category_id', $this->mainCategory->id)
            ->where('sub_category_id', $this->id);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($sub_category) {
            Page::where('sub_category_id', $sub_category->id)
            ->delete();
        });
    }
}
