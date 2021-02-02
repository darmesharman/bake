<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Redirect;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // try {
        //     $request->validate([
        //         'phone_number' => 'phone_number|required',
        //         'password' => 'required'
        //     ]);
        //     $credentials = request(['phone_number', 'password']);
        //     if (!Auth::attempt($credentials)) {
        //       return response()->json([
        //         'status_code' => 500,
        //         'message' => 'Unauthorized'
        //       ]);
        //     }
        //     $user = User::where('phone_number', $request->phone_number)->first();
        //     if ( ! Hash::check($request->password, $user->password, [])) {
        //        throw new \Exception('Error in Login');
        //     }
        //     $tokenResult = $user->createToken('authToken')->plainTextToken;
        //     // dd(tokenResult);
        //     // dd($tokenResult);
        //     // return $next(response()->json([
        //     //     'status_code' => 200,
        //     //     'access_token' => $tokenResult,
        //     //     'token_type' => 'Bearer',
        //     //   ]));

        //     return response()->json([
        //       'status_code' => 200,
        //       'access_token' => $tokenResult,
        //       'token_type' => 'Bearer',
        //     ]);
        //   } catch (Exception $error) {
        //     return response()->json([
        //       'status_code' => 500,
        //       'message' => 'Error in Login',
        //       'error' => $error,
        //     ]);
        //   }

        
        if (! $request->expectsJson()) {
            // return Redirect::to('http://localhost:8000/vue/dashboard');
            return route('login');

        }
    }
}
