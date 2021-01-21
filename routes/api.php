<?php

use App\Models\Alarm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\AlarmResource;

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

Route::post('alarms', 'App\Http\Controllers\AlarmController@storeNewAlarm')->name('api.alarm.new');

Route::get('/alarms/{id}', function ($id) {
    $alarms = Alarm::where('ward_id',$id)->get();
    return AlarmResource::collection($alarms);
})->name('api.alarms.index');

Route::get('/test', function () {
    return "ok";
});
