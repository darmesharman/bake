<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyCollection;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;
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
    public function index(Request $request)
    {
        // $value = session()->all();
        // session()->put('_token', $value["_token"]);
        // dd($value, $request, $value["_token"] , session()->all());
        // dd($request);
        // $value = session('key');

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
        
        // $redis = Redis::connection();
        Redis::publish('updates2', 'test 125');
        Redis::set('updates', 'test 125'); 
        // echo $redis->get('updates2');
        
        // Redis::set('updates', 'test 1');
        // $redis = app()->make('redis');

        return response()->json(compact('companies', 'categories', 'cities', 'districts', 'blogs'), 200, ['Content-Type' => 'application/json']);

        // return (new CompanyCollection($companies))->response();

    }


}
