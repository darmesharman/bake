<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyCollection;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
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
        $companies = Company::with('contacts')->withCount('profileImages');
        
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
        // companyImages
        // profileImages
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
        $validator = $this->validateStoreCompany($request);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $company = Company::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        $company->save();

        $company->contacts()->attach($request->input('contacts'));

        return (new CompanyResource($company))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
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

    protected function validateStoreCompany(Request $request)
    {
        return Validator::make($request->input(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:companies', 'max:255'],
            'contacts' => ['exists:contacts,id'],
        ]);
    }
    protected function validateUpdateCompany($company, Request $request)
    {
        return Validator::make($request->input(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('companies')->ignore($company->id)],
            'contacts' => ['exists:contacts,id'],
        ]);
    }
}
