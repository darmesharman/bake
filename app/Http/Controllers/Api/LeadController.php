<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LeadCollection;
use App\Http\Resources\LeadResource;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
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

        return (new LeadCollection($leads))->response();
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
        }
        $lead->save();

        $lead->contacts()->attach($request->input('contacts'));

        Log::info("Lead ID {$lead->id} created successfully.");

        return (new LeadResource($lead))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        return new LeadResource($lead);
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

        $lead->contacts()->sync($request->input('contacts'));

        Log::info("Lead ID {$lead->id} updated successfully.");

        return (new LeadResource($lead))->response();
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

        // Log::info("Lead {$lead->id} deleted successfully.");

        return (new LeadResource($lead))->response();
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
