<?php

namespace App\GetDataGateway;

use Illuminate\Support\Facades\Http;

class GetDataGateway implements GetDataGatewayContract
{
    public function getData (string $url): array
    {
        $response = Http::get($url);
        return json_decode($response->body(), true);
    }

}