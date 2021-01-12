<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SendSmsController extends Controller
{
    public function sendSmsToVerify(User $user)
    {
        $code = $this->generateFourDigitCode();
        $token = Str::random(40);

        $user->update([
            'code' => $code,
            'token' => Hash::make($token),
        ]);

        $user->save();

        $validation = 'wait';
        if (!$user->phone_verification_send or $user->phone_verification_send->addSeconds(15) <= Carbon::now()) {
            $message = $this->getMessage($user, $code);
            // SendSms::sendSms($user->phone_number, $message);
            $user->update(['phone_verification_send' => Carbon::now()]);
            $user->save();
            $validation = null;
        }

        return redirect()->action(
            [VerifyPhoneController::class, 'getVerify'],
            compact('user', 'token'),
        )->with('wrong_code', $validation);
    }

    protected function getMessage($user, $code)
    {
        if (!$user->phone_verification_send) {
            $message = "${code} - код для регистрации на сайте https://mykid.init.kz";
        } else {
            $message = "${code} - код для смены пароля на сайте https://mykid.init.kz";
        }

        return $message;
    }
    protected function generateFourDigitCode()
    {
        $code = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT) ;

        return $code;
    }
}
