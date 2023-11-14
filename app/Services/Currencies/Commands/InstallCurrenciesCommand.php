<?php

namespace App\Services\Currencies\Commands;

use App\Services\Currencies\Models\Currency;
use Illuminate\Console\Command;

class InstallCurrenciesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:install';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->warn('Установка валют...');

        $query = Currency::query();

        $query->firstOrCreate(['id' => Currency::RUB], ['name' => 'Рубли']);
        $query->firstOrCreate(['id' => Currency::USD], ['name' => 'Доллары']);

        $this->info('Валюты установлены');
    }
}
