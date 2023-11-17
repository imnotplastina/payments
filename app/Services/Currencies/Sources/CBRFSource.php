<?php

namespace App\Services\Currencies\Sources;

use App\Services\Currencies\DTOs\SourcePrice;
use App\Services\Currencies\Enums\SourceEnum;
use App\Supports\AmountValue;
use Illuminate\Database\Eloquent\Collection;

class CBRFSource extends Source
{
    public function getPrices(): Collection
    {
        $response = json_decode(
            json_encode(
                simplexml_load_string(
                    file_get_contents('https://www.cbr.ru/scripts/XML_daily.asp')
                )
            )
        );

        $prices = new Collection([]);

        foreach ($response->Valute as $valuteData) {
            $prices->push(new SourcePrice(
                currency: $valuteData->CharCode,
                value: new AmountValue(
                    str_replace(',', '.', $valuteData->VunitRate)
                )
            ));
        }

        return $prices;
    }

    public function enum(): SourceEnum
    {
        return SourceEnum::CBRF;
    }
}
