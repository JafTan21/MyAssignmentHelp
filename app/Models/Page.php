<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'content',
        'main_category_id',
        'sub_category_id',
    ];

    public function mainCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(ServiceSubCategory::class);
    }
}
