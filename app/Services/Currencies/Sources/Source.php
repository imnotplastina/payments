<?php

namespace App\Services\Currencies\Sources;

use App\Services\Currencies\Enums\SourceEnum;
use Illuminate\Database\Eloquent\Collection;

abstract class Source
{
    abstract public function getPrices(): Collection;
    abstract public function enum(): SourceEnum;
}
