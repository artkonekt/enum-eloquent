<?php

namespace Konekt\Enum\Eloquent;

use Illuminate\Support\ServiceProvider;

class EnumServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\EnumMakeCommand::class,
            ]);
        }
    }
}
