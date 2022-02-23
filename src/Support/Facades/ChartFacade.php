<?php

namespace Kamandlou\LaravelChart\Support\Facades;

use Illuminate\Support\Facades\Facade;

class ChartFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'chart';
    }
}
