<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FactoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            \App\Factory\CategoryFactoryInterface::class,
            \App\Factory\CategoryFactory::class
        );
    }
}
