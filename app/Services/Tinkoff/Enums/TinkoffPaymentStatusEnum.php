<?php

namespace App\Services\Tinkoff\Enums;

enum TinkoffPaymentStatusEnum: string
{
    case AUTHORIZED = 'AUTHORIZED';
    case CONFIRMED = 'CONFIRMED';
    case REJECTED = 'REJECTED';
    case REVERSED = 'REVERSED';
    case REFUNDED = 'REFUNDED';
    case NEW = 'NEW';
}
