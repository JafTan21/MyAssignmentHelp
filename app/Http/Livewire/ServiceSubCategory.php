<?php

namespace App\Http\Livewire;

use App\Models\Page;
use App\Models\ServiceSubCategory as ModelsServiceSubCategory;
use Livewire\Component;

class ServiceSubCategory extends Component
{

    public $serviceCategoryId;
    public $subCategories;
    public $name, $slug;
    public $is_collapsed = true;
    public $error;
    public $pages;

    protected $listeners = [
        'showSubCategory'
    ];

    public function mount()
    {
        $this->pages = Page::all();
    }

    public function showSubCategory($serviceCategoryId)
    {
        $this->serviceCategoryId = $serviceCategoryId;
    }

    public function render()
    {
        $this->subCategories = ModelsServiceSubCategory::where('service_category_id', $this->serviceCategoryId)->get();
        return view('livewire.service-sub-category');
    }

    public function saveNewSubServiceCategory()
    {

        if (ModelsServiceSubCategory::where('slug', $this->slug)->count() > 0) {
            $this->error = 'Slug is already taken';
            return;
        }

        ModelsServiceSubCategory::create([
            'name' => $this->name,
            'service_category_id' => $this->serviceCategoryId,
            'slug' => $this->slug,
        ]);
        $this->name = '';
        $this->slug = '';
        $this->error = '';
    }


    public function toggle_is_collapsed()
    {
        $this->is_collapsed = !$this->is_collapsed;
    }
}
