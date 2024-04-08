<?php

namespace MichaelNabil230\Msegat\Tests;

use MichaelNabil230\Msegat\MsegatServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            MsegatServiceProvider::class,
        ];
    }
}
