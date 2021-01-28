<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategorySelect extends Component
{
    public $subCategories = [];

    protected $listeners = ['categorySelected'];

    public function mount(Request $request)
    {
        if ($request->input('kategoriID')) {
            $this->subCategories = Category::find($request->input('kategoriID'))->subCategories;
        }
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
