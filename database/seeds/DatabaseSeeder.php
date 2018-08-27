<?php

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
        //Initial Data
        $this->call(GenderSeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
