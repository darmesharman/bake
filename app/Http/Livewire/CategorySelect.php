<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategorySelect extends Component
{
    public $category_select;
    public $user = 'jeffrey';
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function updatedCategorySelect()
    {
        $this->user = Category::find($this->category_select)->name;
    }
    public function render()
    {
        return view('livewire.category-select');
    }
}
