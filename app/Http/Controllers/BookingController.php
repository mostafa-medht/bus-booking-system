<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookSeatRequest;
use App\Http\Requests\GetAvailableSeatsRequest;
use App\Services\BookingServices;
use Illuminate\Contracts\Foundation\Application as ApplicationAlias;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;

class BookingController extends Controller
{

    private BookingServices $bookingServices;

    public function __construct(BookingServices $bookingServices)
    {
        $this->bookingServices = $bookingServices;
    }

    /**
     * @param GetAvailableSeatsRequest $request
     * @return array
     */
    public function getAvailableSeats(GetAvailableSeatsRequest $request): array
    {
        return $this->bookingServices->getAvailableSeats($request->validated());
    }

    /**
     * @param BookSeatRequest $request
     * @return Application|Response
     */
    public function bookSeat(BookSeatRequest $request): Application|Response
    {
        $bookSeat = $this->bookingServices->bookSeat($request->validated());

        if ($bookSeat['status'])
            return Response($bookSeat, 200);

        return Response($bookSeat, 422);
    }
}
