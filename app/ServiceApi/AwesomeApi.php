<?php

namespace App\ServiceApi;

use Illuminate\Support\Facades\Http;

class AwesomeApi
{
    const API = 'https://economia.awesomeapi.com.br/last/';

    const CURRENCY = [
        "USD-BRL", "EUR-BRL", "BTC-BRL",
    ];

    public static function getData()
    {
        $url = self::API . implode(',',SELF::CURRENCY);

        $http = Http::get($url);

        if ($http->failed()) {
            abort(400, 'Erro de Conexão com API, tente novamente mais tarde.');
        }

        return json_decode($http->body());
    }
}
