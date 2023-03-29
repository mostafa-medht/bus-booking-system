<?php

namespace App\Services;

use App\Models\Seat;
use App\Models\Trip;
use App\Models\TripStation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookingServices
{
    public function getAvailableSeats($validateData): array
    {
        try {
            $startStationId = $validateData['start_station_id'];
            $endStationId = $validateData['end_station_id'];

            $getAvailableTripsIds = $this->getAvailableTripsIds($startStationId, $endStationId);

            $tripSeats = $this->getTripBasedOnAvailableTripsIds($getAvailableTripsIds);

            $allAvailableSeats = $this->getCustomizedSeatDataPreview($tripSeats);

            return ['status' => true, 'data' => $allAvailableSeats];

        }catch (\Throwable $exception){
            Log::error("Get All Available Seats: Can not get available seats, ".$exception->getMessage());

            return ['status' => false];
        }
    }

    public function bookSeat(array $validatedData): array
    {
        $seat = Seat::find($validatedData['seat_id']);

        if (!$seat)
            return ['status' => false, 'message' => "Seat not found"] ;

        if ($seat->is_booked)
            return ['status' => false, 'message' => "Seat already booked"] ;

        try {

            $this->createBookingSeatInfo($validatedData);

            $this->markBookedSeat($seat);

            Log::info("Book Seat: Seat with id {$seat->id} booked successfully.");

            return ['status' => true, 'message' => 'Seat booked successfully'];

        }catch (\Throwable $exception){
            Log::error("Book Seat : Can not book a seat, ".$exception->getMessage());
            return ['status' => false];
        }
    }

    /**
     * @param $seat
     * @return void
     */
    public function markBookedSeat($seat): void
    {
        $seat->is_booked = true;
        $seat->save();
    }

    /**
     * @param int $startStationId
     * @param int $endStationId
     * @return mixed[]
     */
    public function getAvailableTripsIds(int $startStationId, int $endStationId): array
    {
        return TripStation::query()
            ->whereIn('station_id', [$startStationId, $endStationId])
            ->pluck('trip_id')->toArray();
    }

    /**
     * @param array $getAvailableTripsIds
     * @return Builder[]|Collection
     */
    public function getTripBasedOnAvailableTripsIds(array $getAvailableTripsIds): array|Collection
    {
        return Trip::with(['buses:id,bus_name,trip_id', 'buses.seats' => function ($query) {
            $query->where('is_booked', '=', 0);
        }])
            ->whereIn('id', array_unique($getAvailableTripsIds))
            ->select(['id', 'name', 'start_station_id', 'end_station_id'])
            ->get();
    }

    /**
     * @param Collection|array $trips
     * @return array
     */
    public function getCustomizedSeatDataPreview(Collection|array $trips): array
    {
        $allAvailableSeats = [];

        foreach ($trips as $trip){
            foreach ($trip->buses as $bus) {
                foreach ($bus->seats as $seat) {
                    $allAvailableSeats [] = (object)[
                        'trip_id' => $bus->trip_id,
                        'seat_id' => $seat->id,
                        'seat_number' => $seat->number,
                        'bus_id' => $seat->bus_id
                    ];
                }
            }
        }

        return $allAvailableSeats;
    }

    /**
     * @param array $bookingData
     * @return void
     */
    private function createBookingSeatInfo(array $bookingData): void
    {
        DB::table('bookings')->insert([
            'seat_id'   => $bookingData['seat_id'],
            'trip_id'   => $bookingData['trip_id'],
            'user_id'   => Auth::id(),
            'created_at' => Carbon::now()
        ]);
    }
}
