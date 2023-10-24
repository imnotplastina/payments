<?php

namespace App\Services\Payments\Contracts;

use App\Supports\AmountValue;

interface Payable
{
    public function getPayableName(): string;

    public function getPayableUrl(): string;
    public function getPayableCurrencyId(): string;
    public function getPayableAmount(): AmountValue;
    public function getPayableType(): string;
    public function getPayableId(): int;
}
