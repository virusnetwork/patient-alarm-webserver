<?php

namespace Database\Seeders;

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
        $this->call([
            AlarmSeeder::class,
            BedSeeder::class,
            PatientSeeder::class,
            RoomSeeder::class,
            WardSeeder::class,
        ]);
    }
}
