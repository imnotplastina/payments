<?php

namespace App\Services\Currencies\Sources;

use App\Services\Currencies\Enums\SourceEnum;

class SourceFactory
{
    public static function make(SourceEnum $source): Source
    {
        return match ($source) {
            SourceEnum::Manual => app(ManualSource::class),
            SourceEnum::CBRF => new CBRFSource,
        };
    }
}
