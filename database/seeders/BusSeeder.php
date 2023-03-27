<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buses = [
            [
                'bus_name' => 'Bus 1',
                'trip_id' => 1
            ],
            [
                'bus_name' => 'Bus 2',
                'trip_id' => 2
            ],
            [
                'bus_name' => 'Bus 3',
                'trip_id' => 3
            ],
            // Add more buses here
        ];

        foreach ($buses as $bus) {
            Bus::create($bus);
        }
    }
}
