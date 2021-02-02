<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\Component;

class CategorySelect extends Component
{
    public $category_select;
    public $categories;

    public function mount(Request $request)
    {
        $this->category_select = $request->input('kategoriID');
        $this->categories = Category::all();
    }

    public function updatedCategorySelect()
    {
        $category = Category::find($this->category_select);

        $this->emit('categorySelected', $category);
    }

    public function render()
    {
        return view('livewire.category-select');
    }
}
