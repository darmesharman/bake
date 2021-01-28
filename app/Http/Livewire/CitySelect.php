<?php

namespace App\Http\Livewire;

use App\Models\City;
use Illuminate\Http\Request;
use Livewire\Component;

class CitySelect extends Component
{
    public $city_select;
    public $cities;

    public function mount(Request $request)
    {
        $this->city_select = $request->input('sitiID');
        $this->cities = City::all();
    }

    public function updatedCitySelect()
    {
        $city = City::find($this->city_select);

        $this->emit('citySelected', $city);
    }

    public function render()
    {
        return view('livewire.city-select');
    }
}
