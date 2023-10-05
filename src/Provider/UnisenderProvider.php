<?php

namespace AtLab\Unisender\Provider;

use AtLab\Unisender\Api;
use Illuminate\Support\ServiceProvider;

class UnisenderProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishesPackages();
    }

    private function publishesPackages(): void
    {
        $this->publishes([
            __DIR__.'/../Config/unisender.php' => config_path('unisender.php'),
        ], 'comagic-config');
    }

    /**
     * Register bindings in the container.
     */
    private function registerBindings(): void
    {
        $this->app->singleton(Api::class, function (){
            return new Api();
        });
        $this->app->alias(Api::class, 'unisender');
    }
    public function provides()
    {
        return [Api::class, 'unisender'];
    }
}
