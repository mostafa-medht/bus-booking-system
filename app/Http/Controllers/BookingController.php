<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookSeatRequest;
use App\Http\Requests\GetAvailableSeatsRequest;
use App\Services\BookingServices;
use Illuminate\Http\Response;

class BookingController extends Controller
{

    private BookingServices $bookingServices;

    public function __construct(BookingServices $bookingServices)
    {
        $this->bookingServices = $bookingServices;
    }

    public function getAvailableSeats(GetAvailableSeatsRequest $request)
    {
        return $this->bookingServices->getAvailableSeats($request->validated());

        return response()->json(['seats' => $tripSeats]);
    }

    public function bookSeat(BookSeatRequest $request)
    {
        $bookSeat = $this->bookingServices->bookSeat($request->validated());

        if ($bookSeat['status'])
            return Response($bookSeat, 200);

        return Response($bookSeat, 422);
    }
}
