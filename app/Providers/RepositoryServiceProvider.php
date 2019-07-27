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
            \App\Repository\TagRepositoryInterface::class,
            \App\Repository\TagRepository::class
        );

        $this->app->bind(
            \App\Repository\CategoryRepositoryInterface::class,
            \App\Repository\CategoryRepository::class
        );
    }
}
