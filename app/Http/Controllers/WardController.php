<?php

namespace App\Http\Controllers;

use App\Models\Alarm;
use App\Models\Bed;
use App\Models\Room;
use App\Models\Ward;

class WardController extends Controller
{
    public function show($ward_name)
    {
        ///get all rooms in ward
        $ward_id = Ward::where('name', '=', $ward_name)->first()->id;
        $rooms = Room::where('ward_id', '=', $ward_id)->get();

        ///get all beds in given rooms
        $room_ids = Room::where('ward_id', '=', $ward_id)->get('id');
        $beds = Bed::whereIn('room_id',$room_ids)->get();
        $alarms = Alarm::where('ward_id',$ward_id)->get();
        return view('nurse.mainpage', ['rooms' => $rooms, 'beds' => $beds, 'alarms' =>$alarms]);
    }

    public function show2()
    {
        $wards = Ward::get('name');
        return view('nurse.index', ['wards' => $wards]);
    }
}
