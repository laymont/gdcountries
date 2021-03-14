<?php

namespace Laymont\Gdcountries\Commands;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class GdCountriesInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gdcountries:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install GdCountries';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Installing GdCountries...');

        $this->info('Publishing migrations and seeders...');
        $this->callSilent('vendor:publish', ['--tag' => 'gdcountries-migrations']);
        $this->callSilent('vendor:publish', ['--tag' => 'gdcountries-seeds']);

        $this->info('Run Migrations');
        $this->call('migrate');

        $this->info('Run Seed');
        Artisan::call('db:seed --class=ContinentsSeeder');
        Artisan::call('db:seed --class=CountrySeeder');
        //$this->call(Database\Seeders\ContinentsSeeder::class);

        $this->info('GdCountries was installed successfully.');

    }

}
