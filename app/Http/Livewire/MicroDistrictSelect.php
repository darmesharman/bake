<?php

namespace App\Http\Livewire;

use App\Models\District;
use Illuminate\Http\Request;
use Livewire\Component;

class MicroDistrictSelect extends Component
{
    public $micro_districts = [];

    protected $listeners = ['citySelected', 'districtSelected'];

    public function mount(Request $request)
    {
        if ($request->input('distID')) {
            $this->micro_districts = District::find($request->input('distId'))->micro_districts;
        }
    }

    public function citySelected()
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
