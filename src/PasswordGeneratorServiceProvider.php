<?php

namespace FitPass\PasswordGenerator;

use FitPass\PasswordGenerator\Services\PasswordGeneratorService;
use Illuminate\Support\ServiceProvider;

class PasswordGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'passwordgenerator');

        $this->app->bind('password-generator', PasswordGeneratorService::class);
    }
}
