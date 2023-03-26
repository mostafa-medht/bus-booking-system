<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1'], function () {
    Route::post('login',[UserController::class,'loginUser']);

    Route::group(['middleware' => 'auth:sanctum'],function(){
        // logout
        Route::get('logout',[UserController::class,'logout']);

        // booking routes
        Route::group(['prefix' => 'booking'], function (){
            Route::post('/book-seat', [BookingController::class, 'bookSeat']);
            Route::get('/available-seats', [BookingController::class, 'getAvailableSeats']);
        });
    });
});

