<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyCollection;
use App\Http\Resources\CompanyResource;
use App\Models\AdditionalPhoneNumber;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\CompanyImage;
use App\Models\District;
use App\Models\MicroDistrict;
use App\Models\SocialMediaLink;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
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
            'profileCompanyImages',
        )->withCount('profileCompanyImages');
        if (request()->input('kategoriID')) {
            $companies = $companies->where('category_id', request()->input('kategoriID'));
        }

        if (request()->input('subKategoriID')) {
            $companies = $companies->where('sub_category_id', request()->input('subKategoriID'));
        }

        if (request()->input('sitiID')) {
            $companies = $companies->where('city_id', request()->input('sitiID'));
        }

        if (request()->input('distID')) {
            $companies = $companies->where('district_id', request()->input('distID'));
        }

        if (request()->input('mDistID')) {
            $companies = $companies->where('micro_district_id', request()->input('mDistID'));
        }

        if (request()->input('searchByName')) {
            $companies = $companies->where('name', 'like', '%' . request()->input('searchByName') . '%');
        }

        $companies = $companies->get();
        return (new CompanyCollection($companies))->response();
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
            return $validator->errors();
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
        if ($request->hasfile('company_images')) {
            foreach ($request->file('company_images') as $key => $file) {
                $path = $file->store('images');
                $name = $file->getClientOriginalName();
                CompanyImage::create([
                    'name' => $name,
                    'path' => $path,
                    'company_id' => $company->id,
                ]);
            }
        }

        $this->createOrUpdateAdditionalPhoneNumbers($request->input('additional_phone_numbers'), $company);
        $this->createOrUpdateSocialMedia($request->input('social_media_links'), $company);

        return (new CompanyResource($company))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $company)
    {
        $company->load(['comments' => function ($query) {
            $query->with('user');
        }, 'companySchedules', 'city']);

        return (new CompanyResource($company))->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $validator = $this->validateUpdateCompany($company, $request);

        if ($validator->fails()) {
            return $validator->errors();
        }
        $company->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        $company->save();

        $company->contacts()->sync($request->input('contacts'));

        return (new CompanyResource($company))->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return (new CompanyResource($company))->response()->setStatusCode(204);
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

    protected function createOrUpdateAdditionalPhoneNumbers($input_additional_phone_numbers, $company)
    {
        // delete previous additional phone numbers if we updating
        AdditionalPhoneNumber::where('company_id', $company->id)->get()->each(function ($additional_phone_number, $key) {
            $additional_phone_number->delete();
        });

        if (!$input_additional_phone_numbers) {
            return;
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

    protected function createOrUpdateSocialMedia($social_media_links, $company)
    {
        SocialMediaLink::where('company_id', $company->id)->get()->each(function ($social_media_link, $key) {
            $social_media_link->delete();
        });

        if (!$social_media_links) {
            return;
        }

        foreach ($social_media_links as $social_media_link) {
            if (!$social_media_link) {
                continue;
            }

            SocialMediaLink::create([
                'company_link' => $social_media_link,
                'company_link_name' => $this->getSocialMedia($social_media_link),
                'company_id' => $company->id,
            ]);
        }
    }

    protected function getSocialMedia($social_media_link)
    {
        $link = '';

        if (str_contains($social_media_link, 'facebook.com')) {
            $link = 'facebook';
        } elseif (str_contains($social_media_link, 'vk.com')) {
            $link = 'vk';
        } elseif (str_contains($social_media_link, 'twitter.com')) {
            $link = 'twitter';
        } elseif (str_contains($social_media_link, 'telegram.org')) {
            $link = 'telegram';
        } else {
            $link = 'unknown brother sorry!!!';
        }

        return $link;
    }
}
