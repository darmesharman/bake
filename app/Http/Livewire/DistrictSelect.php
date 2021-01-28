<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\District;
use Livewire\Component;

class DistrictSelect extends Component
{
    public $district_select;
    public $districts;

    protected $listeners = ['citySelected'];

    public function mount()
    {
        $this->districts = [];
    }

    public function updatedDistrictSelect()
    {
        $district = District::find($this->district_select);

        $this->emit('districtSelected', $district);
    }

    public function citySelected(City $city)
    {
        $this->districts = $city->districts;
    }

    public function render()
    {
        return view('livewire.district-select');
    }
}
