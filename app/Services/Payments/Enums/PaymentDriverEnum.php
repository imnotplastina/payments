<?php

namespace App\Services\Payments\Enums;

enum PaymentDriverEnum: string
{
    case Test = 'test';

    public function name(): string
    {
        return match ($this) {
            self::Test => 'Тестовый провайдер',
        };
    }
}
