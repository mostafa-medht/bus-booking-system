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
        // Get the Cairo to Asyut trip
        $trip = Trip::where('start_station_id', 1)
            ->where('end_station_id', 5)
            ->first();

        // Define the stations for the trip
        $stations = [
            ['station_id' => 2, 'stop_order' => 1],
            ['station_id' => 3, 'stop_order' => 2],
            ['station_id' => 4, 'stop_order' => 3],
        ];

        // Loop through each station and create a new TripStation record
        foreach ($stations as $station) {
            TripStation::create([
                'trip_id' => $trip->id,
                'station_id' => $station['station_id'],
                'stop_order' => $station['stop_order'],
            ]);
        }
    }
}
