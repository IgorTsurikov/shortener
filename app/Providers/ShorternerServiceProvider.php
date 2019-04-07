<?php

namespace App\Providers;

use App\Services\ShortenerService;
use Illuminate\Support\ServiceProvider;

class ShorternerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ShortenerService::class, function () {
            return new ShortenerService();
        });
    }
}
