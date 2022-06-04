<?php

namespace App\GetDataGateway;

use Illuminate\Support\Facades\Http;

class GetDataGateway implements GetDataGatewayContract
{
    public function getData (string $url): json
    {
        $response = Http::get($url);
        dd(json_decode($response->body(), true));
       return json_decode($response->body(), true);
    }

}