<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

         $this->call(Cities::class);
        $this->call(AreaTableSeeder::class);
        $this->call(ServiceSeeder::class);
        \App\Models\Service::factory(10)->create();
        // \App\Models\User::factory(10)->create();
    }
}
