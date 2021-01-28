<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Routing\Controller as BaseController;
=======
use App\Models\Blog;
>>>>>>> 29fdea5a524879ea91daf86a39c73638a33fd15f
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\District;
use App\Models\MicroDistrict;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Board;

class HomeController extends BaseController
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

        $blogs = Blog::all();
        $companies = $companies->orderByDesc('views')->take(6)->get();

<<<<<<< HEAD
        return view('welcome', compact('companies', 'categories', 'cities', 'districts'));

=======
        return view('welcome', compact('companies', 'categories', 'cities', 'districts', 'blogs'));
>>>>>>> 29fdea5a524879ea91daf86a39c73638a33fd15f
    }

}
