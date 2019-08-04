<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            \App\Repository\UserRepositoryInterface::class,
        \App\Repository\UserRepository::class
        );

        $this->app->bind(
            \App\Repository\CategoryRepositoryInterface::class,
            \App\Repository\CategoryRepository::class
        );

        $this->app->bind(
            \App\Repository\HomepageReviewRepositoryInterface::class,
            \App\Repository\HomepageReviewRepository::class
        );

        $this->app->bind(
            \App\Repository\ProductRepositoryInterface::class,
            \App\Repository\ProductRepository::class
        );
    }
}
