<?php

namespace MichaelNabil230\LaravelMsegat\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MichaelNabil230\LaravelMsegat\LaravelMsegat
 */
class LaravelMsegat extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-msegat';
    }
}
