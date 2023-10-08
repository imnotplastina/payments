<?php

namespace App\Services\Orders\Enums;

enum OrderStatus: string
{
    case pending = 'pending';
    case completed = 'completed';
    case cancelled = 'cancelled';
}
