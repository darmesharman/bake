<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request): Response
    {
        // $credentials = $request->only('phone_number', 'password');

        // if (Auth::attempt($credentials)) {
        //     return response(Auth::user(), 200);
        // }

        $credentials = request()->validate([
            'phone_number' => 'required|phone_number',
            'password' => 'required',
        ]);
        
        $user = User::where('phone_number', $credentials['phone_number'])->first();
        
        if (! $user || ! Hash::check($credentials['phone_number'], $user->password)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        
        return $this->respondWithToken($user->createAccessToken(), ["user" => $user]);

    }
    public function logout()
    {
        Auth::logout();
        return response(null, 200);
    }
}