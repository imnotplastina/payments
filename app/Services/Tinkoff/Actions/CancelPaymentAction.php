<?php

namespace App\Services\Tinkoff\Actions;

use App\Services\Tinkoff\Entities\TinkoffEntity;
use App\Services\Tinkoff\Enums\TinkoffPaymentStatusEnum;
use App\Services\Tinkoff\TinkoffClient;
use App\Services\Tinkoff\TinkoffConfig;

final class CancelPaymentAction
{
    public function __construct(
        public readonly TinkoffConfig $tinkoff,
    ) {
    }

    public static function make(TinkoffConfig $tinkoff): self
    {
        return new self($tinkoff);
    }

    public function handle(string $id): TinkoffEntity
    {
        $data = [
            'PaymentKey' => $this->tinkoff->terminal,
            'PaymentId' => $id,
        ];

        $data['Token'] = GenerateTokenAction::make($this->tinkoff)
            ->handle($data);

        $response = TinkoffClient::post('/Cancel', $data);

        return new TinkoffEntity(
            id: $response['PaymentId'],
            status: TinkoffPaymentStatusEnum::from('NEW'),
            order: $response['OrderId'],
            amount: $response['NewAmount'],
        );
    }
}
