<?php

namespace App\Services\Tinkoff\Actions;

use App\Services\Tinkoff\DTOs\CreatePaymentData;
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
        unset(
            $data['Token'],
            $data['successUrl'],
            $data['failureUrl'],
            $data['callbackUrl']
        );

        if (isset($data['Success'])) {
            $data['Success'] = $data['Success'] ? 'true' : 'false';
        }

        $data['TerminalKey'] = empty($data['TerminalKey'])
            ? $this->config->terminal
            : $data['TerminalKey'];

        $data['Password'] = $this->config->password;

        $data = $this->switchToUpperCase($data);

        return hash('sha256', collect($data)
            ->sortKeys()
            ->implode(''));
    }

    private function switchToUpperCase(array $data): array
    {
        $switchedData = [];

        foreach ($data as $key => $value) {
            $switchedData[ucfirst($key)] = $value;
        }

        return $switchedData;
    }
}
