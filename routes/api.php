<?php

use App\Models\Alarm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\AlarmResource;
use App\Http\Resources\RoomResource;
use App\Http\Resources\WardResource;
use App\Models\Room;
use App\Models\Ward;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('alarms/new', 'App\Http\Controllers\AlarmController@storeNewAlarm')->name('api.alarm.new');

Route::post('alarms/off', 'App\Http\Controllers\AlarmController@turnOffAlarm')->name('api.alarm.off');

Route::get('/alarms/{id}', function ($id) {
    $alarms = Alarm::where('ward_id', $id)->get();
    return AlarmResource::collection($alarms);
})->name('api.alarms.index');

Route::get('/room/{id}', function ($id) {
    $room = Room::where('id',$id)->get();
    return RoomResource::collection($room);
})->name('api.room.beds');

Route::get('/ward/{id}', function ($id) {
    $ward = Ward::where('id',$id)->get();
    return WardResource::collection($ward);
})->name('api.ward.rooms');

Route::get('/test', function () {
    return "ok";
});
