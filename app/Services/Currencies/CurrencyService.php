<?php

namespace App\Services\Currencies;

use App\Services\Currencies\Actions\UpdateCurrencyPricesAction;
use App\Services\Currencies\Enums\SourceEnum;
use App\Services\Currencies\Sources\Source;
use App\Services\Currencies\Sources\SourceFactory;

class CurrencyService
{
    public function getSource(SourceEnum $source): Source
    {
        return SourceFactory::make($source);
    }

    public function updatePrices(Source $source): UpdateCurrencyPricesAction
    {
        return new UpdateCurrencyPricesAction($source);
    }
}
