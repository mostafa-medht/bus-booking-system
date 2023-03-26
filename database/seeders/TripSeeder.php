<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trips = [
            [
                'start_station_id' => 1,
                'end_station_id' => 5,
                'bus_id' => 1,
            ],
            [
                'start_station_id' => 1,
                'end_station_id' => 3,
                'bus_id' => 2,
            ],
            // Add more trips here
        ];

        foreach ($trips as $trip) {
            Trip::create($trip);
        }
    }
}
