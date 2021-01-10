<?php

namespace App\Http\Middleware;

use App\SendSms\SendSms;
use Closure;
use Illuminate\Http\Request;

class EnsurePhoneIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->phone_verified_at === null) {
            $token = SendSms::sendSmsToVerify($request->user());
            return redirect()->route('verifyPhone.getVerify', [$request->user(), $token]);
        }

        return $next($request);
    }
}
