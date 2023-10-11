<?php

namespace App\Services\Orders\Commands;

use App\Services\Orders\Factories\OrderFactory;
use App\Services\Orders\Models\Order;
use Illuminate\Console\Command;

class InstallOrdersFactoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:install';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->warn('Установка тестовых заказов');

        OrderFactory::new()->count(24)->create();

        $this->info('Тестовые заказы установлены');
    }
}
