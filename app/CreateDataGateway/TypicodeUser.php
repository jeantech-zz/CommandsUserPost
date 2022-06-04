<?php

namespace App\CreateDataGateway;

use Illuminate\Support\Facades\Http;

class TypicodeUser implements CreateDataGatewayContract
{
    private $urlDataUser;

    public function __construct()
    {
        $this->urlDataUser = config('app.urlDataUser');
    }

    public function getData (): json
    {
        $response = Http::post($this->urlDataUser);

       return json_decode($response->body(), true);
    }

}