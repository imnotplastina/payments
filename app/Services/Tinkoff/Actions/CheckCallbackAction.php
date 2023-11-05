<?php

namespace App\Services\Tinkoff\Actions;

use App\Services\Tinkoff\Entities\TinkoffEntity;
use App\Services\Tinkoff\Enums\TinkoffPaymentStatusEnum;
use App\Services\Tinkoff\Exceptions\InvalidTokenException;
use App\Services\Tinkoff\TinkoffConfig;

final class CheckCallbackAction
{
    public function __construct(
        private readonly TinkoffConfig $tinkoff,
    )
    {
    }

    public static function make(TinkoffConfig $tinkoff): self
    {
        return new self($tinkoff);
    }

    /**
     * @throws InvalidTokenException
     */
    public function handle(array $data): TinkoffEntity
    {
        $token = GenerateTokenAction::make($this->tinkoff)
            ->handle($data);

        if ($data['Token'] !== $token) {
            throw new InvalidTokenException(
                "Не верный токен"
            );
        }

        return new TinkoffEntity(
            id: $data['PaymentId'],
            status: TinkoffPaymentStatusEnum::from('NEW'),
            order: $data['OrderId'],
            amount: $data['Amount'],
            url: $data['PaymentURL'],
        );
    }
}
