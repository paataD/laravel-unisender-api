<?php

namespace AtLab\Unisender\Provider;

use AtLab\Unisender\Api;
use AtLab\Unisender\Commands\SynchCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;

class UnisenderProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishesPackages();
        $this->loadRoutesFrom(__DIR__ .  '/../routes.php');
        if ($this->app->runningInConsole()) {
            $this->commands([
                SynchCommand::class,
            ]);
        }
        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);
            $schedule->command('unisender:synch-command')->everyMinute();
        });
    }

    private function publishesPackages(): void
    {
        $this->publishes([
            __DIR__.'/../Config/unisender.php' => config_path('unisender.php'),
        ], 'unisender-config');
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
