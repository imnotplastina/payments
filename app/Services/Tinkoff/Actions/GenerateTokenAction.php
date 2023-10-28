<?php

namespace App\Services\Tinkoff\Actions;

use App\Services\Tinkoff\TinkoffConfig;

final class GenerateTokenAction
{
    public function __construct(
        private readonly TinkoffConfig $config
    ) {
    }

    public static function make(TinkoffConfig $config): self
    {
        return new self($config);
    }

    public function handle(array $data): string
    {
        $data['Password'] = $this->config->password;

        return hash('sha256', collect($data)
            ->sortKeys()
            ->implode(''));
    }
}
