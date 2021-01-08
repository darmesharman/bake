<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SendSmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('sendSms', function () {
            return new \App\SendSms\SendSms;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
