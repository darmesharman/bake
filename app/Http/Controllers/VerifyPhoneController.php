<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
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

    public function getVerify(User $user, $token)
    {
        return view('auth.verify-phone', [
            'phone_number' => $user->phone_number,
            'token' => $token,
        ]);
    }

    public function postVerify(Request $request)
    {
        Validator::make($request->input(), [
            'code' => ['required', 'regex:/^\d{4}$/'],
        ])->validate();

        $user = User::where('phone_number', $request->input('phone_number'))->first();

        if (!Hash::check($request->input('token'), $user->token)) {
            return back()->with('wrong_code', 'Invalid token');
        }

        if ($user->code !== $request->input('code')) {
            return back()->with('wrong_code', 'You entered wrong code');
        }

        if ($user->phone_verified_at) {
            $user->update([
                'code' => null,
            ]);

            $user->save();

            return redirect()->route('resetPassword.index', [
                'user' => $user,
                'token' => $request->input('token'),
            ]);
        } else {
            $user->update([
                'code' => null,
                'token' => null,
                'phone_verified_at' => now(),
            ]);

            $user->save();

            $this->guard->login($user);

            return app(RegisterResponse::class);
        }
    }
}
