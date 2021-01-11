<?php

namespace App\SendSms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SendSms
{
    public static function sendSmsToVerify($user)
    {
        $code = SendSms::generateCode();
        $token = Str::random(40);

        $user->update([
            'code' => $code,
            'token' => Hash::make($token),
        ]);

        $user->save();

        $message = "${code} - код для регистрации на сайте https://mykid.init.kz";
        // SendSms::sendSms($user->phone_number, $message);

        return $token;
    }

    public static function sendSmsToResetPassword($user)
    {
        $code = SendSms::generateCode();
        $token = Str::random(40);

        $user->update([
            'code' => $code,
            'token' => Hash::make($token),
        ]);

        $user->save();

        $message = "${code} - код для смены пароля на сайте https://mykid.init.kz";
        // SendSms::sendSms($user->phone_number, $message);

        return $token;
    }

    protected static function sendSms($phone_number, $message)
    {
        $link = 'https://smsc.kz/sys/send.php';

        Http::get($link, [
            'login' => 'mykidkz',
            'psw' => 'f39391baadf771e31384e90bc3e1603796733356',
            'phones' => $phone_number,
            'mes' => $message,
        ]);
    }

    protected static function generateCode()
    {
        // generate random four digit code
        $code = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT) ;

        return $code;
    }
}
