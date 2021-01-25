<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\District;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name')->get();
        $subCategories = [];

        $cities = City::select('id', 'name')->get();
        $districts = [];
        $micro_districts = [];

        $companies = Company::with(
            'category:id,name',
            'city:id,name',
            'additional_phone_numbers',
            'comments'
        );

        $companies = Company::all();

        return view('welcome', compact('companies', 'categories', 'subCategories', 'cities', 'districts', 'micro_districts'));
    }
}
