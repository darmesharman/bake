<?php

namespace App\SendSms\Facades;

use Illuminate\Support\Facades\Facade;

class SendSmsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sendSms';
    }
}
