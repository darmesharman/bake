<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SendSmsController extends Controller
{
    public function sendSms($phone)
    {
        dd($phone);
        $user = User::where('phone_number', $phone)->first();

        $code = $this->generateCode();

        $user->update([
            'code' => $code,
            'token' => Hash::make(Str::random(40)),
        ]);

        $user->save();

        // send sms
    }

    protected function generateCode()
    {
        // generate random four digit code
        $code = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT) ;

        return $code;
    }
}
