<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
include_once "sms.php";

class SendSmsController extends Controller
{
    public function sendSms($phone)
    {

        $user = User::where('phone_number', $phone)->first();

        $code = $this->generateCode();

        $user->update([
            'code' => $code,
            'token' => Hash::make(Str::random(40)),
        ]);

        send_sms( $user->phone_number, $code . " - код подтверждения Вашего телефона.");
        dd($user->code);
        $user->save();

    }

    protected function generateCode()
    {
        // generate random four digit code
        $code = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT) ;

        return $code;
    }
}

