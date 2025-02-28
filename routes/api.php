<?php

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
Route::get('/user/{id}',[UserController::class,'getUser']);

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