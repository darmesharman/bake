<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Comment;
use App\Models\Company;
use App\Models\District;
use App\Models\Image;
use App\Models\AdditionalPhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::select('id', 'name')->get();
        $subCategories = [];
        $cities = City::select('id', 'name')->get();
        $districts = [];
        $companies = Company::with(
            'category:id,name',
            'city:id,name',
            'additional_phone_numbers',
            'comments'
        );


        if (request()->input('kategoriID')) {
            $companies = $companies->where('category_id', request()->input('kategoriID'));
            $subCategories = Category::find(request()->input('kategoriID'))->subCategories;
        }

        if (request()->input('subKategoriID')) {
            $companies = $companies->where('sub_category_id', request()->input('subKategoriID'));
        }

        if (request()->input('sitiID')) {
            $companies = $companies->where('city_id', request()->input('sitiID'));
            $districts = City::find(request()->input('sitiID'))->districts;
        }

        if (request()->input('distID')) {
            $companies = $companies->where('district_id', request()->input('distID'));
        }

        $companies = $companies->get();

        if (request('searchByName')) {
            $companies = $companies->filter(function ($company, $index) {
                if (stripos($company->name, request('searchByName')) === false) {
                    return false;
                }
                return true;
            });
        }

        return view('companies.index', compact('companies', 'categories', 'subCategories', 'cities', 'districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::with('subCategories')->get();
        $cities = City::with('districts')->get();

        return view('companies.create', compact('categories', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateCompany($request);

        if ($validator->fails()) {
            return redirect()
                ->route('companies.create')
                ->withErrors($validator)
                ->withInput();
        }

        $company = Company::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'description' => $request->input('description'),
            'short_description' => $request->input('short_description'),
            'site' => $request->input('site'),
            'category_id' => $request->input('category'),
            'city_id' => $request->input('city'),
            'phone_number' => $request->input('phone_number'),
        ]);
        $company->save();
        // Get image file
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

        $company->save();
        $this->createOrUpdateAdditionalPhoneNumbers($request->input('additional_phone_numbers'));

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
        $categories = Category::with('subCategories')->get();
        $cities = City::with('districts')->get();

        return view('companies.edit', compact('company', 'categories', 'cities'));
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
        $validator = $this->validateCompany($request, $company);

        if ($validator->fails()) {
            return redirect()
                ->route('companies.edit', $company)
                ->withErrors($validator);
        }

        $company->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'description' => $request->input('description'),
            'short_description' => $request->input('short_description'),
            'site' => $request->input('site'),
            'category_id' => $request->input('category'),
            'city_id' => $request->input('city'),
            'phone_number' => $request->input('phone_number'),
        ]);

        if ($request->hasfile('company_images')) {
            foreach ($request->file('company_images') as $key => $file) {
                @
                $path = $file->store('images');
                $name = $file->getClientOriginalName();
                $insert[$key]['name'] = $name;
                $insert[$key]['path'] = $path;
                $insert[$key]['company_id'] = $company->id;
            }
        }
        Image::insert($insert);

        $company->save();

        $this->createOrUpdateAdditionalPhoneNumbers($request->input('additional_phone_numbers'), $company);

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
        $photos = Image::where('company_id', $company->id)->get();

        foreach ($photos as $photo) {
            Storage::delete($photo->path);
        }

        $company->delete();

        return redirect()->route('companies.index');
    }

    protected function validateCompany(Request $request, Company $company = null)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'company_image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'description' => ['required', 'string', 'min:255', 'max:10240'],
            'short_description' => ['required', 'string', 'min:255', 'max:5120'],
            'city' => ['required', 'exists:cities,id'],
            'category' => ['required', 'exists:categories,id'],
            'site' => ['required', 'string', 'max:2048'],
            'phone_number' => ['required', 'starts_with:77', 'digits:11', 'unique:companies'],
            'additional_phone_numbers.*' => ['nullable', 'starts_with:77', 'digits:11', 'distinct'],
            'email' => ['required', 'string', 'max:255', 'unique:companies',],
        ];

        if ($company) {
            $rules['phone_number'] = ['required', 'starts_with:77', 'digits:11', Rule::unique('companies')->ignore($company->id)];
            $rules['email'] = ['required', 'email', 'max:255', Rule::unique('companies')->ignore($company->id)];
        }

        $messages = [];

        return Validator::make($request->input(), $rules, $messages);
    }

    protected function createOrUpdateAdditionalPhoneNumbers($input_additional_phone_numbers, $company = null)
    {
        // delete previous additional phone numbers if we updating
        if ($company) {
            AdditionalPhoneNumber::where('company_id', $company->id)->get()->each(function ($additional_phone_number, $key) {
                $additional_phone_number->delete();
            });
        }

        // create inputed additional phone numbers
        foreach ($input_additional_phone_numbers as $phone_number) {
            // if request phone_number is null then continue
            if (!$phone_number) {
                continue;
            }

            // if request phone_number already exists in db then continue
            // it is catched in validation but this is additional secure
            if (AdditionalPhoneNumber::where('phone_number', $phone_number)->first()) {
                continue;
            }

            AdditionalPhoneNumber::create([
                'phone_number' => $phone_number,
                'company_id' => $company->id,
            ]);
        }
    }
}
