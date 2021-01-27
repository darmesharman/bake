<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategorySelect extends Component
{
    public $category_select;
    public $user = 'jeffrey';

    public function updatedCategorySelect()
    {
        $this->user = $this->category_select;
    }
    public function render()
    {
        return view('livewire.category-select');
    }
}
