<?php

namespace App\Services\Currencies\Sources;

use App\Services\Currencies\Enums\SourceEnum;
use Illuminate\Database\Eloquent\Collection;

class ManualSource extends Source
{
    public function getPrices(): Collection
    {
        return new Collection([]);
    }

    public function enum(): SourceEnum
    {
        return SourceEnum::Manual;
    }
}
