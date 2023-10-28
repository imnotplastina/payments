<?php

namespace App\Services\Tinkoff\Entities;

use App\Services\Tinkoff\Enums\TinkoffPaymentStatusEnum;

class TinkoffEntity
{
    public function __construct(
        public readonly int $id,
        public readonly TinkoffPaymentStatusEnum $status,
        public readonly string $order,
        public readonly int $amount,
        public readonly ?string $url = null,
    ) {
    }
}
