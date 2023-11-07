<?php

namespace App\Services\Tinkoff;

use App\Services\Tinkoff\Actions\CancelPaymentAction;
use App\Services\Tinkoff\Actions\CheckCallbackAction;
use App\Services\Tinkoff\Actions\CreatePaymentAction;
use App\Services\Tinkoff\Actions\FindPaymentAction;
use App\Services\Tinkoff\DTOs\CreatePaymentData;
use App\Services\Tinkoff\Entities\TinkoffEntity;
use App\Services\Tinkoff\Exceptions\InvalidTokenException;
use App\Services\Tinkoff\Exceptions\TinkoffException;

class TinkoffService
{
    public function __construct(
        public readonly TinkoffConfig $config
    ) {
    }

    /**
     * @throws TinkoffException
     */
    public function createPayment(CreatePaymentData $data): TinkoffEntity
    {
        return CreatePaymentAction::make($this->config)
            ->handle($data);
    }

    /**
     * @throws TinkoffException
     */
    public function findPayment(string $id): TinkoffEntity
    {
        return FindPaymentAction::make($this->config)
            ->handle($id);
    }

    /**
     * @throws TinkoffException
     */
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
