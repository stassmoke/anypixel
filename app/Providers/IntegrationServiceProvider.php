<?php

namespace App\Providers;

use App\Integration\EvantoMarketApi;
use Carbon\Laravel\ServiceProvider;

class IntegrationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $api = new EvantoMarketApi(config('services.evantomarker.token'));

        $this->app->instance(EvantoMarketApi::class, $api);
    }
}
