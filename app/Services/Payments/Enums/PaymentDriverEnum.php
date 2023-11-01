<?php

namespace App\Services\Payments\Enums;

enum PaymentDriverEnum: string
{
    case Test = 'test';
    case Tinkoff = 'tinkoff';

    public function name(): string
    {
        return match ($this) {
            self::Test => 'Тестовый провайдер',
            self::Tinkoff => 'Банковской картой',
        };
    }
}
