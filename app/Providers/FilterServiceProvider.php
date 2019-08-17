<?php

namespace App\Providers;

use Carbon\Laravel\ServiceProvider;

class FilterServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            \App\Filter\ProductFilterInterface::class,
            \App\Filter\ProductFilter::class
        );
    }
}
