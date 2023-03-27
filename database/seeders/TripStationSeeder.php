<?php

namespace Database\Seeders;

use App\Models\Trip;
use App\Models\TripStation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the stations for the trip
        $stations = [
            ['station_id' => 1, 'stop_order' => 1],
            ['station_id' => 2, 'stop_order' => 2],
            ['station_id' => 3, 'stop_order' => 3],
            ['station_id' => 4, 'stop_order' => 4],
            ['station_id' => 5, 'stop_order' => 5],
        ];

        // Loop through each station and create a new TripStation record
        foreach ($stations as $station) {
            TripStation::create([
                'trip_id' => 1,
                'station_id' => $station['station_id'],
                'stop_order' => $station['stop_order'],
            ]);
        }

        // Define the stations for the trip
        $stations = [
            ['station_id' => 5, 'stop_order' => 1],
            ['station_id' => 4, 'stop_order' => 2],
            ['station_id' => 3, 'stop_order' => 3],
            ['station_id' => 2, 'stop_order' => 4],
        ];

        foreach ($stations as $station) {
            TripStation::create([
                'trip_id' => 3,
                'station_id' => $station['station_id'],
                'stop_order' => $station['stop_order'],
            ]);
        }
    }
}
