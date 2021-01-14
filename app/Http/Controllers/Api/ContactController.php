<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactCollection;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::with('companies')->get();

        return (new ContactCollection($contacts))->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateStoreContact($request);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $contact = Contact::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
        ]);

        $contact->companies()->attach($request->input('companies'));

        return (new ContactResource($contact))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return (new ContactResource($contact))->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $validator = $this->validateUpdateContact($request, $contact);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $contact->update([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'email' => $request->email,
        ]);

        $contact->companies()->sync($request->input('companies'));

        return (new ContactResource($contact))->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return (new ContactResource($contact))->response()->setStatusCode(204);
    }

    protected function validateStoreContact(Request $request)
    {
        return Validator::make($request->input(), [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'unique:contacts', 'max:255'],
            'companies' => ['exists:companies,id'],
        ]);
    }

    protected function validateUpdateContact(Request $request, $contact)
    {
        return Validator::make($request->input(), [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('contacts')->ignore($contact->id)],
            'companies' => ['exists:companies,id'],
        ]);
    }
}
