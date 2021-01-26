<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityCollection;
use App\Http\Resources\DistrictCollection;
use App\Http\Resources\MicroDistrictCollection;
use App\Models\City;
use App\Models\District;
use App\Models\MicroDistrict;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cities()
    {
        $cities = City::all();

        return (new CityCollection($cities))->response();
    }

    public function districts()
    {
        $districts = District::all();

        return (new DistrictCollection($districts))->response();
    }

    public function microDistricts()
    {
        $micro_districts = MicroDistrict::all();

        return (new MicroDistrictCollection($micro_districts))->response();
    }
}
