<?php

namespace MichaelNabil230\Msegat;

use MichaelNabil230\Msegat\Interfaces\OTPGeneratorInterfaces;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MsegatServiceProvider extends PackageServiceProvider
{
    public function registeringPackage(): void
    {
        $this->app->bind(OTPGeneratorInterfaces::class, $this->app['config']['msegat.otp_generator']);
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-msegat')
            ->hasConfigFile();
    }
}
