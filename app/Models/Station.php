<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    public function startTrips()
    {
        return $this->hasMany(Trip::class, 'start_station_id');
    }

    public function endTrips()
    {
        return $this->hasMany(Trip::class, 'end_station_id');
    }

    public function intermediateTrips()
    {
        return $this->belongsToMany(Trip::class, 'trip_stations');
    }
}
