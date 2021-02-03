<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function update(Request $request, UpdatesUserProfileInformation $updater)
    {
        $updater->update($request->user(), $request->all());
        if (Auth::user()->phone_number != $request->input(['phone_number'])) {
            return redirect()->route('sendSms.sendSmsToVerify', compact('user'));
        }
        return back();
    }
}
