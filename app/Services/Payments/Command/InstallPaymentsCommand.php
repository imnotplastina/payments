<?php

namespace App\Services\Payments\Command;

use App\Services\Payments\Models\PaymentMethod;
use Illuminate\Console\Command;

class InstallPaymentsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:install';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->warn('Установка платежей...');

        $this->createPaymentMethod();

        $this->info('Платежи установлены');
    }

    private function createPaymentMethod(): void
    {
        PaymentMethod::query()
            ->firstOrCreate([
                'driver' => 'test'
            ], [
                'name' => 'Тестовый способ',
                'active' => !app()->isProduction(),
            ]);
    }
}
