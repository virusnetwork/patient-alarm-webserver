<?php

namespace App\Http\Controllers;

use App\Models\Alarm;
use App\Models\Bed;
use App\Models\Room;
use App\Models\Patient;
use App\Models\Ward;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AlarmController extends Controller
{

    public function storeNewAlarm(Request $request)
    {
        $validatedData = $request->validate([
            'bed_id' => 'required|integer',
            'reason' => 'required|max:255',
        ]);

        $a = new Alarm();
        $a->patient_id = Patient::where('bed_id', $validatedData['bed_id'])->first()->id;
        $a->bed_id =  $validatedData['bed_id'];
        $a->room_id = Bed::find($a->bed_id)->room_id;
        $a->ward_id = Room::find($a->room_id)->ward_id;
        $a->reason = $validatedData['reason'];
        $a->save();
    }
}
