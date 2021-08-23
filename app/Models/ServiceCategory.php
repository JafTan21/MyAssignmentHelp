<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function serviceSubCategories()
    {
        return $this->hasMany(ServiceSubCategory::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            if ($category->serviceSubCategories) {
                $category->serviceSubCategories()->each(function ($sub_category) use ($category) {
                    $sub_category->delete();
                    Page::where('main_category_id', $category->id)
                        ->where('sub_category_id', $sub_category->id)
                        ->delete();
                });
            }
        });
    }
}
