<?php

namespace App\Services\Currencies\DTOs;

use App\Supports\AmountValue;

class SourcePrice
{
    public function __construct(
        public readonly string $currency,
        public readonly AmountValue $value,
    ) {
    }
}
