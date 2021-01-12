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
        $user = User::where('phone_number', $input['phone_number'])->first();

        if ($user and !$user->phone_verified_at) {
            $user->delete();
        }

        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'regex:/^\d{11}$/', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'city' => ['required', 'string', 'max:255'],
        ])->validate();

        return User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'phone_number' => $input['phone_number'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'city' => $input['city'],
        ]);
    }
}
