<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            StationSeeder::class,
            TripSeeder::class,
            BusSeeder::class,
            SeatSeeder::class,
            BookingSeeder::class,
            TripStationSeeder::class
        ]);
    }
}
