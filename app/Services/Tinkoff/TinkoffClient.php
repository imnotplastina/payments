<?php

namespace App\Services\Tinkoff;

use App\Services\Tinkoff\Exceptions\TinkoffException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class TinkoffClient
{
    /**
     * @throws TinkoffException
     */
    public static function post(string $url, array $data): array
    {
        $response = self::client()
            ->post($url, $data)
            ->json();

        if (! $response['Success']) {
            throw new TinkoffException($response['Details']);
        }

        return $response;
    }

    public static function client(): PendingRequest
    {
        return Http::baseUrl('https://securepay.tinkoff.ru/v2');
    }
}
