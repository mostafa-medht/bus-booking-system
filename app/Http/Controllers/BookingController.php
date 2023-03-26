<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetAvailableSeatsRequest;
use App\Models\Seat;
use App\Models\Trip;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function getAvailableSeats(GetAvailableSeatsRequest $request)
    {

        $tripId = $request->input('trip_id');
        $tripSeats = Trip::with(['buses:id,bus_name', 'buses.seats:id,bus_id' => function($query){
            $query->where('is_booked', '=', 0);
        }])
            ->where('id', $tripId)
            ->firstOrFail();

        return response()->json(['seats' => $tripSeats]);
    }
}
