<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\District;
use App\Models\MicroDistrict;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name')->get();
        // $subCategories = SubCategory::select('id', 'name')->get();

        $cities = City::select('id', 'name')->get();
        $districts = District::select('id', 'name')->get();
        // $micro_districts = MicroDistrict::select('id', 'name')->get();

        $companies = Company::with(
            'city:id,name',
            'profileImages',
        );

        $companies = $companies->orderByDesc('views')->take(6)->get();

        return view('welcome', compact('companies', 'categories', 'cities', 'districts'));
    }
}
