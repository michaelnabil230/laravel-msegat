<?php

namespace MichaelNabil230\LaravelMsegat;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelMsegatServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-msegat')
            ->hasConfigFile();
    }
}
