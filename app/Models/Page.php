<?php

namespace App\Models;

use App\Services\StaticPageGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'has_static_page'
    ];

    public function mainCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(ServiceSubCategory::class);
    }

    public function getStaticPageExistsAttribute()
    {
        return Storage::disk('public_htmls')->exists('service/' . $this->slug . '.html');
    }
}
