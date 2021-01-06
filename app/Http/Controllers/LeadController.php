<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Lead;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = Lead::with(['status', 'contacts', 'company'])->get();

        return view('leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        $contacts = Contact::all();
        $companies = Company::all();

        return view('leads.create', compact('statuses', 'contacts', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateLead($request);

        $lead = Lead::create([
            'name' => $request->input('name'),
            'status_id' => $request->input('status'),
            'sum' => $request->input('sum'),
        ]);

        if ($request->input('company')) {
            $lead->company_id = $request->input('company');
            $lead->save();
        }

        if ($request->input('contacts')) {
            $lead->contacts()->attach($request->input('contacts'));
        }

        return redirect()->route('leads.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        return view('leads.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        $statuses = Status::all();
        $contacts = Contact::all();
        $companies = Company::all();

        return view('leads.edit', compact('lead', 'statuses', 'contacts', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        $this->validateLead($request);

        $lead->update([
            'name' => $request->input('name'),
            'status_id' => $request->input('status'),
            'sum' => $request->input('sum'),
        ]);

        if ($request->input('company')) {
            $lead->company_id = $request->input('company');
        } else {
            $lead->company_id = null;
        }
        $lead->save();

        if ($request->input('contacts')) {
            $lead->contacts()->sync($request->input('contacts'));
        }

        return redirect()->route('leads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();

        return back();
    }

    protected function validateLead(Request $request)
    {
        Validator::make($request->input(), [
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string'],
            'sum' => ['required', 'numeric'],
            'contacts' => ['required', 'exists:contacts,id'],
        ])->validate();

        if ($request->input('company')) {
            Validator::make($request->input(), [
                'company' => ['exists:companies,id'],
            ])->validate();
        }
    }
}
