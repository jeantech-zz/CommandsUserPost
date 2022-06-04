<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\GetDataGateway\GetDataGatewayContract;
use App\GetDataGateway\GetDataGateway;

class AppServiceProvider extends ServiceProvider
{
    public function register():void
    {
        //
    }

    public function boot():void
    {
        Schema::defaultstringLength(191);
        $this->app->bind(GetDataGatewayContract::class, GetDataGateway::class);
   
    }
}
