<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\ResetUserPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function index(User $user, $token)
    {
        return view('auth.reset-password', compact('user', 'token'));
    }

    public function store(Request $request, ResetUserPassword $resetor)
    {
        $user = User::where('phone_number', $request->input('phone_number'))->first();

        if (!Hash::check($request->input('token'), $user->token)) {
            return back()->with('status', 'Invalid token');
        }

        $user->token = null;
        $user->save();

        $resetor->reset($user, $request->input());

        return redirect()->route('login');
    }
}
