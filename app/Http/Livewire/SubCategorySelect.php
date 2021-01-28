<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class SubCategorySelect extends Component
{
    public $subCategories;

    protected $listeners = ['categorySelected'];

    public function mount()
    {
        $this->subCategories = [];
    }

    public function categorySelected(Category $category)
    {
        $this->subCategories = $category->subCategories;
    }

    public function render()
    {
        return view('livewire.sub-category-select');
    }
}
