<?php

namespace App\Services\Tinkoff;

class TinkoffConfig
{
    public function __construct(
        public readonly string $terminal,
        public readonly string $password,
    ) {
    }
}
