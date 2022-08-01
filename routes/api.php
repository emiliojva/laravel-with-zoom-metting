<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', function () {
    return [
        'result' => true,
    ];
});

// Get list of meetings.
Route::get('/meetings', [App\Http\Controllers\Zoom\MeetingController::class,'list']);

// Create meeting room using topic, agenda, start_time.
Route::post('/meetings', [App\Http\Controllers\Zoom\MeetingController::class,'create']);

// Get information of the meeting room by ID.
Route::get('/meetings/{id}', [App\Http\Controllers\Zoom\MeetingController::class,'get'])->where('id', '[0-9]+');
Route::patch('/meetings/{id}', [App\Http\Controllers\Zoom\MeetingController::class,'update'])->where('id', '[0-9]+');
Route::delete('/meetings/{id}', [App\Http\Controllers\Zoom\MeetingController::class,'delete'])->where('id', '[0-9]+');
