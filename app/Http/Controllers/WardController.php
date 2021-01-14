<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Ward;
use Illuminate\Http\Request;

class WardController extends Controller
{
    public function show($ward_name)
    {
        $ward_id = Ward::where('name', '=', $ward_name)->first()->id;
        $rooms = Room::where('ward_id', '=', $ward_id)->get();
        return view('nurse.mainpage', ['rooms' => $rooms]);
    }
}
