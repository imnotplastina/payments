<?php

namespace App\Services\Currencies\Actions;

use App\Services\Currencies\Exceptions\SourceException;
use App\Services\Currencies\Models\Currency;
use App\Services\Currencies\Sources\Source;

final class UpdateCurrencyPricesAction
{
    public function __construct(
        private readonly Source $source,
    ) {
    }

    /**
     * @throws SourceException
     */
    public function handle(): array
    {
        $currencies = Currency::query()
            ->where('source', $this->source->enum())
            ->get();

        foreach ($currencies as $currency) {
            $price = $this->source
                ->getPrices()
                ->firstWhere('currency', $currency->id);

            is_null($price) && throw new SourceException(
                'Не удалось получить цену валюты ' . $currency->id
            );

            $currency->update(['price' => $price]);
        }
    }
}
