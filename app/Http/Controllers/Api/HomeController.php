<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyCollection;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\Blog;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\District;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        // return view('welcome', );
        return response()->json(compact('companies', 'categories', 'cities', 'districts', 'blogs'), 200, ['Content-Type' => 'application/json']);

        // return (new CompanyCollection($companies))->response();

    }


}
