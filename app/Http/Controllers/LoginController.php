<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('phone_number', 'password');

        // return response()
        // ->json([], 200, ['Content-Type' => 'application/json']);

            
        // return response()
        // ->json([], 200, ['Content-Type' => 'application/json']);

        if (Auth::attempt($credentials)) {
            
            // return response()
            // ->json([], 200, ['Content-Type' => 'application/json']);

                return response(Auth::user(), 200);
        }


        // $credentials = request()->validate([
            // 'phone_number' => 'required|phone_number',
            // 'password' => 'required',/
        // ]);
        
        
        // if (! $user || ! Hash::check($credentials['phone_number'], $user->password)) {
        //     return response()->json(['message' => 'Unauthorized'], 401);
        // }
                
        // $user = User::where('phone_number', $credentials['phone_number'])->first();
         
        // if(!Hash::check($user->password, $credentials->password, []))
        //     return $this->respondWithToken($user->createAccessToken(), ["user" => $user]);

    }
    public function logout()
    {
        Auth::logout();
        return response(null, 200);
    }
}