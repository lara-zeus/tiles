<?php

namespace LaraZeus\Tiles;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class TilesServiceProvider extends PackageServiceProvider
{
    public static string $name = 'zeus-tiles';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasViews(static::$name);
    }
}
