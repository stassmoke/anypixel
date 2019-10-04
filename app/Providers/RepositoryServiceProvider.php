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

        $this->app->bind(
            \App\Repository\ProductReviewRepositoryInterface::class,
            \App\Repository\ProductReviewRepository::class
        );

        $this->app->bind(
            \App\Repository\SubscriberRepositoryInterface::class,
            \App\Repository\SubscriberRepository::class
        );

        $this->app->bind(
            \App\Repository\CounterRepositoryInterface::class,
            \App\Repository\CounterRepository::class
        );

        $this->app->bind(
            \App\Repository\HomepageInfoRepositoryInterface::class,
            \App\Repository\HomepageInfoRepository::class
        );

        $this->app->bind(
            \App\Repository\SocialRepositoryInterface::class,
            \App\Repository\SocialRepository::class
        );

        $this->app->bind(
            \App\Repository\AfterEffectsPackRepositoryInterface::class,
            \App\Repository\AfterEffectsPackRepository::class
        );

        $this->app->bind(
            \App\Repository\EvantroCodeRepositoryInterface::class,
            \App\Repository\EvantroCodeRepository::class
        );
    }
}
