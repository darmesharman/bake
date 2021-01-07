<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Auth\StatefulGuard;
use Laravel\Fortify\Contracts\RegisterResponse;

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
        return view('auth.verify-phone', compact('user'));
    }

    public function postVerify(Request $request)
    {
        $user = User::where('phone_number', $request->input('phone_number'))->first();

        Validator::make($request->input(), [
            'code' => ['required', 'regex:/^\d{4}$/'],
            'token' => ['exists:users']
        ])->validate();

        if ($user->token !== $request->input('token')) {
            return back();
        }

        if ($user->code === $request->input('code')) {
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
