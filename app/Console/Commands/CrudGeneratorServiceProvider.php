<?php

namespace App\Console\Commands;

use Illuminate\Support\ServiceProvider;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->publishes([
        //     __DIR__ . '/../config/crudgenerator.php' => config_path('crudgenerator.php'),
        // ]);
        //
        // $this->publishes([
        //     __DIR__ . '/../publish/views/' => base_path('resources/views/'),
        // ]);
        //
        // if (\App::VERSION() <= '5.2') {
        //     $this->publishes([
        //         __DIR__ . '/../publish/css/app.css' => public_path('css/app.css'),
        //     ]);
        // }
        //
        // $this->publishes([
        //     __DIR__ . '/stubs/' => base_path('resources/crud-generator/'),
        // ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            'App\Console\Commands\Commands\CrudCommand',
            'App\Console\Commands\Commands\CrudControllerCommand',
            'App\Console\Commands\Commands\CrudModelCommand',
            'App\Console\Commands\Commands\CrudMigrationCommand',
            'App\Console\Commands\Commands\CrudRouteCommand',
            'App\Console\Commands\Commands\CrudViewCommand',
            'App\Console\Commands\Commands\CrudLangCommand',
            'App\Console\Commands\Commands\CrudApiCommand',
            'App\Console\Commands\Commands\CrudApiControllerCommand'
        );
    }
}
