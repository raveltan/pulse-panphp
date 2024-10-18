<?php

namespace Schmeits\PulsePanphp\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Schmeits\PulsePanphp\PulsePanphp
 */
class PulsePanphp extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Schmeits\PulsePanphp\PulsePanphp::class;
    }
}
