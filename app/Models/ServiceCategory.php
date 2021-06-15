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
        return $this->hasMany(ServiceSubCategory::class, 'service_categories_id', 'id');
    }
}
