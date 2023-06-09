<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seats = [
            [
                'number' => 1,
                'bus_id' => 1,
            ],
            [
                'number' => 2,
                'bus_id' => 1,
            ],
            [
                'number' => 3,
                'bus_id' => 1,
            ],
            [
                'number' => 4,
                'bus_id' => 1,
            ],
            [
                'number' => 5,
                'bus_id' => 1,
            ],
            [
                'number' => 6,
                'bus_id' => 1,
            ],
            [
                'number' => 7,
                'bus_id' => 1,
            ],[
                'number' => 8,
                'bus_id' => 1,
            ],
            [
                'number' => 9,
                'bus_id' => 1,
            ],
            [
                'number' => 10,
                'bus_id' => 1,
            ],
            [
                'number' => 11,
                'bus_id' => 1,
            ],
            [
                'number' => 12,
                'bus_id' => 1,
            ],
            [
                'number' => 1,
                'bus_id' => 2,
            ],
            [
                'number' => 2,
                'bus_id' => 2,
            ],
            [
                'number' => 3,
                'bus_id' => 2,
            ],
            [
                'number' => 4,
                'bus_id' => 2,
            ],
            [
                'number' => 5,
                'bus_id' => 2,
            ],
            [
                'number' => 6,
                'bus_id' => 2,
            ],
            [
                'number' => 7,
                'bus_id' => 2,
            ],[
                'number' => 8,
                'bus_id' => 2,
            ],
            [
                'number' => 9,
                'bus_id' => 2,
            ],
            [
                'number' => 10,
                'bus_id' => 2,
            ],
            [
                'number' => 11,
                'bus_id' => 2,
            ],
            [
                'number' => 12,
                'bus_id' => 2,
            ],
            [
                'number' => 1,
                'bus_id' => 3,
            ],
            [
                'number' => 2,
                'bus_id' => 3,
            ],
            [
                'number' => 3,
                'bus_id' => 3,
            ],
            [
                'number' => 4,
                'bus_id' => 3,
            ],
            [
                'number' => 5,
                'bus_id' => 3,
            ],
            [
                'number' => 6,
                'bus_id' => 3,
            ],
            [
                'number' => 7,
                'bus_id' => 3,
            ],[
                'number' => 8,
                'bus_id' => 3,
            ],
            [
                'number' => 9,
                'bus_id' => 3,
            ],
            [
                'number' => 10,
                'bus_id' => 3,
            ],
            [
                'number' => 11,
                'bus_id' => 3,
            ],
            [
                'number' => 12,
                'bus_id' => 3,
            ],
            // Add more seats here
        ];

        foreach ($seats as $seat)
            Seat::create($seat);
    }
}
