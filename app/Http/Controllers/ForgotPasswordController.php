<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\SendSms\SendSms;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => ['required', 'string', 'regex:/^\d{11}$/', 'exists:users']
        ]);

        $user = User::where('phone_number', $request->input('phone_number'))->first();
        $token = SendSms::sendSmsToVerify($user);

        return redirect()->action(
            [VerifyPhoneController::class, 'getVerify'],
            ['user' => $user, 'token' => $token],
        );
    }
}
