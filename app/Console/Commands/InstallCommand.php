<?php

namespace App\Console\Commands;

use App\Services\Currencies\Commands\InstallCurrenciesCommand;
use App\Services\Payments\Command\InstallPaymentsCommand;
use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->warn('Установка приложения...');

        $this->call(InstallCurrenciesCommand::class);
        $this->call(InstallPaymentsCommand::class);

        $this->info('Приложение установлено');
    }
}
