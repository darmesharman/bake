<?php

namespace App\SendSms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SendSms
{
    public static function sendSmsToVerify($phone_number)
    {
        $user = User::where('phone_number', $phone_number)->first();

        $code = SendSms::generateCode();
        $token = Str::random(40);

        $user->update([
            'code' => $code,
            'token' => Hash::make($token),
        ]);

        $user->save();

        $message = "Код подтверждения регистрации: ${code}";
        SendSms::sendSms($user->phone_number, $message);

        return $token;
    }

    protected static function sendSms($phone_number, $message)
    {
        $link = 'https://smsc.kz/sys/send.php';
        $response = Http::get($link, [
            'login' => 'mykidkz',
            'psw' => 'f39391baadf771e31384e90bc3e1603796733356',
            'phones' => $phone_number,
            'mes' => $message,
        ]);

        return $response;
    }

    protected static function generateCode()
    {
        // generate random four digit code
        $code = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT) ;

        return $code;
    }
}
