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
                'name' => 'Bus 1',
            ],
            [
                'name' => 'Bus 2',
            ],
            // Add more buses here
        ];

        foreach ($buses as $bus) {
            Bus::create($bus);
        }
    }
}
