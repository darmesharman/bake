<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\District;
use App\Models\MicroDistrict;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Board;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;
class HomeController extends BaseController
{
    public function index(Request $reqeust)
    {
        // dd($reqeust, session()->all()["_token"]);

        $categories = Category::select('id', 'name')->get();
        // $subCategories = SubCategory::select('id', 'name')->get();

        $cities = City::select('id', 'name')->get();
        $districts = District::select('id', 'name')->get();
        // $micro_districts = MicroDistrict::select('id', 'name')->get();

        $companies = Company::with(
            'city:id,name',
        );

        $blogs = Blog::with('tags', 'profile')->take(6)->get();
        $companies = $companies->orderByDesc('views')->take(6)->get();

        return view('welcome', compact('companies', 'categories', 'cities', 'districts', 'blogs'));
    }
}
