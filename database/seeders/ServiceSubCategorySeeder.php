<?php

namespace Database\Seeders;

use App\Models\ServiceSubCategory;
use Illuminate\Database\Seeder;

class ServiceSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceSubCategory::create([
            'name' => 'First sub Category',
            'service_category_id' => 1,
            'slug' => 'slug-1'
        ]);

        ServiceSubCategory::create([
            'name' => 'Second sub Category',
            'service_category_id' => 1,
            'slug' => 'slug-2'
        ]);
    }
}
