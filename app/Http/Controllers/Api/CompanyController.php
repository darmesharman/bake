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
        $companies = Company::with('contacts')->get();

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
        $this->validateCreateCompany($request);
        $company = new Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');

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
        return new CompanyResource($company);
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
        $this->validateUpdateCompany($company, $request);

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

    protected function validateCreateCompany(Request $request)
    {
        Validator::make($request->input(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'unique:companies', 'max:255'],
        ])->validate();

        if ($request->input('company')) {
            Validator::make($request->input(), [
                'companies' => ['exists:companies,id'],
            ])->validate();
        }
    }
    protected function validateUpdateCompany($company,Request $request)
    {
        Validator::make($request->input(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('companies')->ignore($company->id)],
        ])->validate();

        if ($request->input('company')) {
            Validator::make($request->input(), [
                'companies' => ['exists:companies,id'],
            ])->validate();
        }
    }
}
