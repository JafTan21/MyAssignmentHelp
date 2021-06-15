<?php

namespace App\Http\Livewire;

use App\Models\ServiceSubCategory as ModelsServiceSubCategory;
use Livewire\Component;

class ServiceSubCategory extends Component
{

    public $serviceCategoryId;
    public $subCategories;
    public $name;
    public $is_collapsed = false;

    protected $listeners = [
        'showSubCategory'
    ];

    public function showSubCategory($serviceCategoryId)
    {
        $this->serviceCategoryId = $serviceCategoryId;
    }

    public function render()
    {
        $this->subCategories = ModelsServiceSubCategory::where('service_categories_id', $this->serviceCategoryId)->get();
        return view('livewire.service-sub-category');
    }

    public function saveNewSubServiceCategory()
    {
        ModelsServiceSubCategory::create([
            'name' => $this->name,
            'service_categories_id' => $this->serviceCategoryId,
        ]);
        $this->name = '';
    }


    public function toggle_is_collapsed()
    {
        $this->is_collapsed = !$this->is_collapsed;
    }
}
