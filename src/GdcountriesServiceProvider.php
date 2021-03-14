<?php

namespace Laymont\Gdcountries;

use Illuminate\Support\ServiceProvider;
use Laymont\Gdcountries\Commands\GdCountriesInstall;

class GdcountriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishResources();
        }

        if ($this->app->runningInConsole()) {
            $this->commands([
                GdCountriesInstall::class,
            ]);
        }

        $this->loadRoutesFrom (__DIR__.'/../routes/web.php');
    }

    protected function publishResources()
    {
        $this->publishes([
            __DIR__ . '/../database/migrations/2021_03_14_141128_create_countries_table.php' => database_path('migrations/2021_03_14_141128_create_countries_table.php'),
        ], 'gdcountries-migrations');

        $this->publishes([
            __DIR__ . '/../database/migrations/2021_03_14_141128_create_continents_table.php' => database_path('migrations/2021_03_14_141128_create_continents_table.php'),
        ], 'gdcountries-migrations');

        $this->publishes([
            __DIR__ . '/../database/seeds/ContinentsSeeder.php' => database_path('seeders/ContinentsSeeder.php'),
        ], 'gdcountries-seeds');

        $this->publishes([
            __DIR__ . '/../database/seeds/CountrySeeder.php' => database_path('seeders/CountrySeeder.php'),
        ], 'gdcountries-seeds');
    }
}
