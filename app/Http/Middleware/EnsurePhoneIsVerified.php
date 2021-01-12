<?php

namespace App\Http\Middleware;

use App\Http\Controllers\SendSmsController;
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
            return redirect()->action(
                [SendSmsController::class, 'sendSmsToVerify'],
                ['user' => $request->user()]
            );
        }

        return $next($request);
    }
}
