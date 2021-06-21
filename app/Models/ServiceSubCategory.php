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
}
