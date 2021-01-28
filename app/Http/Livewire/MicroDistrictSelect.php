<?php

namespace App\Http\Livewire;

use App\Models\District;
use Livewire\Component;

class MicroDistrictSelect extends Component
{
    public $micro_districts;

    protected $listeners = ['districtSelected'];

    public function mount()
    {
        $this->micro_districts = [];
    }

    public function districtSelected(District $district)
    {
        $this->micro_districts = $district->micro_districts;
    }

    public function render()
    {
        return view('livewire.micro-district-select');
    }
}
