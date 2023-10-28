<?php

namespace App\Services\Tinkoff\Actions;

use App\Services\Tinkoff\DTO\CreatePaymentData;
use App\Services\Tinkoff\Entities\TinkoffEntity;
use App\Services\Tinkoff\Enums\TinkoffPaymentStatusEnum;
use App\Services\Tinkoff\TinkoffClient;
use App\Services\Tinkoff\TinkoffConfig;

final class CreatePaymentAction
{
    public function __construct(
        public readonly TinkoffConfig $tinkoff,
    ) {
    }

    public static function make(TinkoffConfig $tinkoff): self
    {
        return new self($tinkoff);
    }

    public function handle(CreatePaymentData $data): TinkoffEntity
    {
        $response = TinkoffClient::post('/Create', [
                'TinkoffKey' => $this->tinkoff->terminal,
                'Amount' => $data->amount,
                'OrderId' => $data->order,
            ]);

        return new TinkoffEntity(
            id: $response['PaymentId'],
            status: TinkoffPaymentStatusEnum::from('NEW'),
            order: $response['OrderId'],
            amount: $response['Amount'],
            url: $response['PaymentUrl'],
        );
    }
}
