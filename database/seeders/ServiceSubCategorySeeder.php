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
        for ($i=0; $i<100; $i++) {
            ServiceSubCategory::create([
                'name' => 'sub Category' . $i,
                'service_category_id' => rand(1, 20),
                'slug' => 'sub-Category-' . $i
            ]);
        }
    }
}
