<?php

namespace App\Services\Tinkoff\Actions;

use App\Services\Tinkoff\DTOs\CreatePaymentData;
use App\Services\Tinkoff\Entities\TinkoffEntity;
use App\Services\Tinkoff\Enums\TinkoffPaymentStatusEnum;
use App\Services\Tinkoff\Exceptions\TinkoffException;
use App\Services\Tinkoff\TinkoffClient;
use App\Services\Tinkoff\TinkoffConfig;
use Illuminate\Support\Facades\Http;

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

    /**
     * @throws TinkoffException
     */
    public function handle(CreatePaymentData $data): TinkoffEntity
    {
        $response = TinkoffClient::post('/Init', [
            'TerminalKey' => $this->tinkoff->terminal,
            'Amount' => $data->amount,
            'OrderId' => $data->orderId,
            'SuccessURL' => $data->successUrl,
            'FailURL' => $data->failureUrl,
//            'NotificationURL' => $data->callbackUrl,
            'Token' => GenerateTokenAction::make($this->tinkoff)
                ->handle((array) $data),
        ]);

        return new TinkoffEntity(
            id: $response['PaymentId'],
            status: TinkoffPaymentStatusEnum::from('NEW'),
            order: $response['OrderId'],
            amount: $response['Amount'],
            url: $response['PaymentURL'],
        );
    }
}
