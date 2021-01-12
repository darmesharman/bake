<?php

namespace App\SendSms;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SendSms
{
    public static function sendSms($phone_numbers, $message)
    {
        $link = 'https://smsc.kz/sys/send.php';

        if (is_array($phone_numbers)) {
            $phone_numbers = implode(';', $phone_numbers);
        }

        return $phone_numbers;

        Http::get($link, [
            'login' => 'mykidkz',
            'psw' => 'f39391baadf771e31384e90bc3e1603796733356',
            'phones' => $phone_numbers,
            'mes' => $message,
        ]);
    }
}
