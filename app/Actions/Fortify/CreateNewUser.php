<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\SendSms\SendSms;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'string', 'min:12', 'max:12', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'city' => ['required', 'string', 'max:255'],
        ])->validate();

        // $code = $this->generateCode();

        // $code = $this->sendCode($input['phone_number']);
        $user = User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'phone_number' => $input['phone_number'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'city' => $input['city'],
            // 'code' => $code,
        ]);

        /**
         * Above code sends sms to given phone_number, generate token and
         * return it. Then set to user hashed token
         * at the end it return user and unhased token
         * This was done to save unhased token.
         */
        $token = SendSms::sendSmsToVerify($input['phone_number']);
        $user->token = Hash::make($token);
        $user->save();

        return compact('user', 'token');
    }
}
