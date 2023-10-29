<?php

namespace App\Services\Tinkoff;

use App\Services\Tinkoff\Actions\CancelPaymentAction;
use App\Services\Tinkoff\Actions\CheckCallbackAction;
use App\Services\Tinkoff\Actions\CreatePaymentAction;
use App\Services\Tinkoff\Actions\FindPaymentAction;
use App\Services\Tinkoff\DTO\CreatePaymentData;
use App\Services\Tinkoff\Entities\TinkoffEntity;
use App\Services\Tinkoff\Exceptions\InvalidTokenException;

class TinkoffService
{
    public function __construct(
        public readonly TinkoffConfig $config
    ) {
    }

    public function createPayment(CreatePaymentData $data): TinkoffEntity
    {
        return CreatePaymentAction::make($this->config)
            ->handle($data);
    }

    public function findPayment(string $id): TinkoffEntity
    {
        return FindPaymentAction::make($this->config)
            ->handle($id);
    }

    public function cancelPayment(string $id): TinkoffEntity
    {
        return CancelPaymentAction::make($this->config)
            ->handle($id);
    }

    /**
     * @throws InvalidTokenException
     */
    public function checkCallback(array $data): TinkoffEntity
    {
        return CheckCallbackAction::make($this->config)
            ->handle($data);
    }
}
