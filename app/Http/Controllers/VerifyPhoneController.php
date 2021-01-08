<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\SendSms\SendSms;
use Illuminate\Contracts\Auth\StatefulGuard;
use Laravel\Fortify\Contracts\RegisterResponse;
use Illuminate\Support\Facades\Hash;

class VerifyPhoneController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function getVerify(User $user)
    {
        $token = SendSms::sendSmsToVerify($user->phone_number);

        return view('auth.verify-phone', [
            'phone_number' => $user->phone_number,
            'token' => $token,
        ]);
    }

    public function postVerify(Request $request)
    {
        $user = User::where('phone_number', $request->input('phone_number'))->first();

        Validator::make($request->input(), [
            'code' => ['required', 'regex:/^\d{4}$/'],
        ])->validate();

        if (!Hash::check($request->input('token'), $user->token)) {
            return back();
        }

        if (Hash::check($request->input('code'), $user->code)) {
            $user->update([
                'code' => null,
                'token' => null,
                'phone_verified_at' => now(),
            ]);

            $user->save();

            $this->guard->login($user);

            return app(RegisterResponse::class);
        }

        return back();
    }
}
