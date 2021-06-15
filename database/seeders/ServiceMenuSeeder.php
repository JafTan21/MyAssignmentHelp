<?php

namespace Database\Seeders;

use App\Models\ServiceMenu;
use Illuminate\Database\Seeder;

class ServiceMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceMenu::create([
            'name' => 'Service menu 1',
            'slug' => '#'
        ]);

        ServiceMenu::create([
            'name' => 'Service sub menu 1',
            'slug' => '#',
            'submenu_of' => 1,
        ]);

        ServiceMenu::create([
            'name' => 'Service sub sub menu 1',
            'slug' => 'service-sub-sub-menu-1',
            'sub_submenu_of' => 2,
        ]);
    }
}
