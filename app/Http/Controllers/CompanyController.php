<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Comment;
use App\Models\Company;
use App\Models\AdditionalPhoneNumber;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Traits\UploadTrait;
use Database\Factories\AdditionalPhoneNumberFactory;
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
        $companies = Company::with(
            'category:id,name',
            'city:id,name',
            'additional_phone_numbers',
            'comments'
        )->get();
        $cities = City::select('id', 'name')->get();

        return view('companies.index', compact('companies', 'cities'));
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

        // Get image file
        if ($request->has('company_image')) {
            $image = $request->file('company_image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $company->company_image = $filePath;
        }

        $company->save();

        foreach ($request->input('additional_phone_numbers') as $phone_number) {
            if (!$phone_number) {
                continue;
            }

            AdditionalPhoneNumber::create([
                'phone_number' => $phone_number,
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
        $like_counter = Comment::withCount(['likes_count', 'dislikes_count'])->get();

        return view('companies.show', compact('company', 'like_counter'));
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

        if ($request->has('company_image')) {
            $image = $request->file('company_image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Delete image
            $this->deleteOne(null, 'public', $company->company_photo);
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $company->company_image = $filePath;
        }

        $company->save();

        // delete previous additional phone numbers
        AdditionalPhoneNumber::where('company_id', $company->id)->get()->each(function ($additional_phone_number, $key) {
            $additional_phone_number->delete();
        });

        // add new additional phone numbers
        foreach ($request->input('additional_phone_numbers') as $phone_number) {
            if (!$phone_number) {
                continue;
            }

            AdditionalPhoneNumber::create([
                'phone_number' => $phone_number,
                'company_id' => $company->id,
            ]);
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

    public function validateCompany(Request $request, Company $company = null)
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
}
