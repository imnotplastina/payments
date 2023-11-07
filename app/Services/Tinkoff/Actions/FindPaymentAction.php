<?php

namespace App\Services\Tinkoff\Actions;

use App\Services\Tinkoff\Entities\TinkoffEntity;
use App\Services\Tinkoff\Enums\TinkoffPaymentStatusEnum;
use App\Services\Tinkoff\Exceptions\TinkoffException;
use App\Services\Tinkoff\TinkoffClient;
use App\Services\Tinkoff\TinkoffConfig;

final class FindPaymentAction
{
    public function __construct(
        public readonly TinkoffConfig $tinkoff,
    ) {
    }

    public static function make(TinkoffConfig $tinkoff): self
    {
        return new self($tinkoff);
    }

    /**
     * @throws TinkoffException
     */
    public function handle(string $id): TinkoffEntity
    {
        $data = [
            'TerminalKey' => $this->tinkoff->terminal,
            'PaymentId' => $id,
        ];

        $data['Token'] = GenerateTokenAction::make($this->tinkoff)
            ->handle($data);

        $response = TinkoffClient::post('/GetState', $data);

        return new TinkoffEntity(
            id: $response['PaymentId'],
            status: TinkoffPaymentStatusEnum::from('NEW'),
            order: $response['OrderId'],
            amount: $response['Amount'],
        );
    }
}
