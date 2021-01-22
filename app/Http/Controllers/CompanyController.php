<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Contact;
use App\Models\PhoneNumber;
use App\Models\District;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::with('city', 'numbers', 'comments')->get();
        $cities = City::all();

        return view('companies.index', compact('companies', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        // $sub_categories = Sub_Category::where('category_id', $request->input('category_id'));
        $cities = City::all();
        $districts = District::all();

        return view('companies.create', compact('categories', 'cities', 'districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateCreateCompany($request);
        $company = Company::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'description' => $request->input('description'),
            'short_description' => $request->input('short_description'),
            'site' => $request->input('site'),
            'category_id' => $request->input('category'),
            'city_id' => $request->input('city'),
        ]);
        // Get image file
        $company->save();

        if ($request->hasfile('company_images')) {
            foreach ($request->file('company_images') as $key => $file) {
                $path = $file->store('images');
                $name = $file->getClientOriginalName();
                $insert[$key]['name'] = $name;
                $insert[$key]['path'] = $path;
                $insert[$key]['company_id'] = $company->id;
            }
        }
        Image::insert($insert);


        foreach ($request->input('numbers') as $number) {
            PhoneNumber::create([
            'phone_number' => $number,
            'company_id' => $company->id,
            ]);
        }

        return Redirect(route('companies.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $categories = Category::all();
        // $sub_categories = Sub_Category::where('category_id', $request->input('category_id'));
        $cities = City::all();
        $districts = District::all();
        return view('companies.edit', compact('company', 'cities', 'districts', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $this->validateUpdateCompany($company, $request);

        $company->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'description' => $request->input('description'),
            'short_description' => $request->input('short_description'),
            'site' => $request->input('site'),
            'category_id' => $request->input('category'),
            'city_id' => $request->input('city'),
        ]);

        if ($request->hasfile('company_images')) {
            foreach ($request->file('company_images') as $key => $file) {
                $path = $file->store('/images');
                $name = $file->getClientOriginalName();
                $insert[$key]['name'] = $name;
                $insert[$key]['path'] = $path;
                $insert[$key]['company_id'] = $company->id;
            }
        }
        Image::updating($insert);

        PhoneNumber::where('company_id', $company->id)->get()->each(function ($phone_number, $key) {
            $phone_number->delete();
        });

        $company->save();

        foreach ($request->input('numbers') as $number) {
            PhoneNumber::create([
                'phone_number' => $number,
                'company_id' => $company->id,
            ]);
        }

        $phone_numbers = PhoneNumber::all();
        foreach ($phone_numbers as $phone_number) {
            if ($phone_number->number === null) {
                $phone_number->delete();
            }
        }

        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return back();
    }

    public function validateCreateCompany(Request $request)
    {
        Validator::make($request->input(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'unique:companies', 'max:255'],
            'company_image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'description' => ['required', 'string', 'max:10240', 'min:255'],
            'short_description' => ['required', 'string', 'max:5120', 'min:255'],
            'city' => ['required'],
            'category' => ['required'],
            'site' => ['required', 'string', 'max:255'],
            'numbers' => ['required', 'array', 'min:1'],
        ])->validate();
    }

    public function validateUpdateCompany($company, Request $request)
    {
        Validator::make($request->input(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('companies')->ignore($company->id)],
            'company_image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'description' => ['required', 'string', 'max:10240', 'min:255'],
            'short_description' => ['required', 'string', 'max:10240', 'min:255'],
            'city' => ['required'],
            'category' => ['required'],
            'site' => ['required', 'string', 'max:255'],
            'numbers' => ['required', 'array', 'min:1'],
        ])->validate();
    }
}
