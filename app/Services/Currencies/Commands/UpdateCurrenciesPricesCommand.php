<?php

namespace App\Services\Currencies\Commands;

use App\Services\Currencies\CurrencyService;
use App\Services\Currencies\Enums\SourceEnum;
use App\Services\Currencies\Exceptions\SourceException;
use App\Services\Currencies\Models\Currency;
use Illuminate\Console\Command;

class UpdateCurrenciesPricesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:prices {source}';

    /**
     * Execute the console command.
     * @throws SourceException
     */
    public function handle(CurrencyService $service): void
    {
        $this->warn('Обновление курсов валют...');

        $source = $service->getSource(
            SourceEnum::from($this->argument('source'))
        );

        $service->updatePrices($source)
            ->handle();

        $this->info('Курсы валют обновлены');
    }
}
