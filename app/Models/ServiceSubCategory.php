<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'service_categories_id'];


    public function mainCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
}
