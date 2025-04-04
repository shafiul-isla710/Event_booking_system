<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('first', function (Request $request) {
     return "Hello Bangladesh";
});

/***
 *  start user controller operation
 */

//get all users
Route::get('/users',[UserController::class,'getUsers']);
//get single user by id
// Route::get('/user/{id}',[UserController::class,'getUser']);
//create user
Route::post('/user-create',[UserController::class,'createUser']);
//update user
Route::put('/user-update/{id}',[UserController::class,'updateUser']);
//Delete user by id
Route::delete('/user-delete/{id}',[UserController::class,'destroyUser']);

 /***
 *  start event controller operation
 */

 //get all events
Route::get('/events',[EventController::class,'getEvents']);
//get single event by id
Route::get('/event/{id}',[EventController::class, 'getEvent']);
//create event
Route::post('/event-create',[EventController::class,'createEvent']);
//update event
Route::put('/event-update/{id}',[EventController::class,'updateEvent']);
//delete event
Route::delete('/event-delete/{id}',[EventController::class,'destroyEvent']);


 /***
 *  start Booking controller operation
 */
Route::get('/bookings',[BookingController::class,'getBookings']);
//get single booking by id
Route::get('/booking/{id}',[BookingController::class,'getBooking']);
//get booking by user id
Route::get('/booking-user/{id}',[BookingController::class,'getBookingsByUserId']);

//create booking
Route::post('/booking-create',[BookingController::class,'createBooking']);
//update booking
Route::put('/booking-update/{id}',[BookingController::class,'updateBooking']);
//delete booking
Route::delete('/booking-delete/{id}',[BookingController::class,'destroyBooking']);


/***
 * Authentication controller operation
 */

 Route::post('/member-registration',[AuthController::class,'memberRegistration']);
 Route::post('/login',[AuthController::class, 'login']);
 Route::get('/user/{id}',[AuthController::class, 'getUser'])->middleware('auth:sanctum');
 Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
