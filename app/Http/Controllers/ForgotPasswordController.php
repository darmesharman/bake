<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function getVerify(Request $request)
    {
        $user = User::where('phone_number', $request->input('phone_number'))->first();

        // sendsms($phone, $message);

        return redirect()->action([VerifyPhoneController::class, 'getVerify'], ['user' => $user]);
    }
}
