<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    public function startStation()
    {
        return $this->belongsTo(Station::class, 'start_station_id');
    }

    public function endStation()
    {
        return $this->belongsTo(Station::class, 'end_station_id');
    }

    public function intermediateStations()
    {
        return $this->belongsToMany(Station::class, 'trip_stations');
    }

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }
}
