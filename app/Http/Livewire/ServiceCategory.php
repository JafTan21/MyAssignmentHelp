<?php

namespace App\Http\Livewire;

use App\Models\ServiceCategory as ModelsServiceCategory;
use Livewire\Component;

class ServiceCategory extends Component
{

    public $active = '';
    public $name;
    public $is_collapsed = false;

    public function render()
    {
        return view('livewire.service-category', [
            'serviceCategories' => ModelsServiceCategory::all(),
        ]);
    }

    public function openSubCategoryOf($seviceCategoryId)
    {
        $this->active = $seviceCategoryId;
        $this->emit('showSubCategory', $seviceCategoryId);
    }

    public function saveNewServiceCategory()
    {
        ModelsServiceCategory::create([
            'name' => $this->name
        ]);
        $this->name = '';
    }

    public function toggle_is_collapsed()
    {
        $this->is_collapsed = !$this->is_collapsed;
    }
}
