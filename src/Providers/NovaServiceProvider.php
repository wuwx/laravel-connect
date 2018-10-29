<?php

namespace Wuwx\LaravelConnect\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;
use Wuwx\LaravelConnect\Nova\Identity;
use Wuwx\LaravelConnect\Nova\Provider;

class NovaServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function boot()
    {
        Nova::resources([
            Identity::class,
            Provider::class,
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
