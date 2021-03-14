<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContinentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('continents')->insert([
            ['continent_code' => 'AF', 'continent_name' => 'Africa', 'created_at' => now(), 'updated_at' => now()],
            ['continent_code' => 'AN', 'continent_name' => 'Antarctica', 'created_at' => now(), 'updated_at' => now()],
            ['continent_code' => 'AS', 'continent_name' => 'Asia', 'created_at' => now(), 'updated_at' => now()],
            ['continent_code' => 'EU', 'continent_name' => 'Europe', 'created_at' => now(), 'updated_at' => now()],
            ['continent_code' => 'OC', 'continent_name' => 'Australia', 'created_at' => now(), 'updated_at' => now()],
            ['continent_code' => 'NA', 'continent_name' => 'North America', 'created_at' => now(), 'updated_at' => now()],
            ['continent_code' => 'SA', 'continent_name' => 'South America', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
