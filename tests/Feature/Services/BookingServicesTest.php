<?php

namespace Services;

use App\Models\Seat;
use App\Services\BookingServices;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class BookingServicesTest extends TestCase
{
    use DatabaseTransactions;

    private BookingServices $bookingServices;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bookingServices = app(BookingServices::class);
    }

    /**
     * Test getAvailableSeats method returns available seats.
     *
     * @return void
     */
    public function testGetAvailableSeatsReturnsAvailableSeats(): void
    {
        // Arrange
        $startStationId = 1;
        $endStationId = 3;

        // Act
        $result = $this->bookingServices->getAvailableSeats([
            'start_station_id' => $startStationId,
            'end_station_id' => $endStationId,
        ]);

        // Assert
        $this->assertTrue($result['status']);
        $this->assertIsArray($result['data']);
    }

    /**
     * Test bookSeat method returns an error message when the seat is not found.
     *
     * @return void
     */
    public function testBookSeatReturnsErrorMessageWhenSeatNotFound(): void
    {
        // Arrange
        $validatedData = [
            'seat_id' => 9999,
        ];

        // Act
        $result = $this->bookingServices->bookSeat($validatedData);

        // Assert
        $this->assertFalse($result['status']);
        $this->assertEquals('Seat not found', $result['message']);
    }

    /**
     * Test bookSeat method returns an error message when the seat is already booked.
     *
     * @return void
     */
    public function testBookSeatReturnsErrorMessageWhenSeatAlreadyBooked(): void
    {
        // Arrange
        $seat = Seat::create([
            'is_booked' => true,
            'number' => 1,
            'bus_id' => 1
        ]);
        $validatedData = [
            'seat_id' => $seat->id,
        ];

        // Act
        $result = $this->bookingServices->bookSeat($validatedData);

        // Assert
        $this->assertFalse($result['status']);
        $this->assertEquals('Seat already booked', $result['message']);
    }
}
