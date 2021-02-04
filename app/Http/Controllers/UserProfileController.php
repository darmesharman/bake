<?php

namespace App\Http\Controllers;

use App\Events\ProfileInformationUpdated;
use App\Models\City;
use App\Models\User;
use App\Rules\NewPhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UserProfileController extends Controller
{
    /**
     * Show the user profile screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        $cities = City::all();

        return view('profile.show', [
            'request' => $request,
            'user' => $request->user(),
            'cities' => $cities,
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Fortify\Contracts\UpdatesUserProfileInformation  $updater
     * @return \Illuminate\Http\Response
     */
    public function updateProfileInformation(Request $request, UpdatesUserProfileInformation $updater)
    {
        $updater->update($request->user(), $request->all());

        ProfileInformationUpdated::dispatch($request->user());

        return back();
    }

    /**
     * Update the user's phone number.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePhoneNumber(Request $request)
    {
        $user = User::find(Auth::id(0));

        $validator = $this->validatePhoneNumber($request);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $phone_number = $request->input('phone_number');

        return redirect()->route('sendSms.sendSmsToVerify', compact('user', 'phone_number'));
    }

    protected function validatePhoneNumber(Request $request)
    {
        $rules = [
            'phone_number' => ['required', new NewPhoneNumber,'unique:users'],
        ];

        $messages = [];

        return Validator::make($request->input(), $rules, $messages);
    }
}
