<?php

namespace App\Services\Currencies\Sources;

use App\Services\Currencies\Enums\SourceEnum;
use Illuminate\Database\Eloquent\Collection;

class CBRFSource extends Source
{
    public function getPrices(): Collection
    {
        return new Collection([1, 2 ,3]);
    }

    public function enum(): SourceEnum
    {
        return SourceEnum::CBRF;
    }
}
