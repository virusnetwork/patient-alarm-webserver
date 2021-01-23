<?php

namespace App\Http\Resources;

use App\Models\Bed;
use App\Models\Patient;
use App\Models\Room;
use Illuminate\Http\Resources\Json\JsonResource;

class AlarmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'reason' => $this->reason,
            'timeOfAlarm' => $this->timeOfAlarm,
            'updated_at' => $this->updated_at,
            'bed_id' => (Patient::find($this->patient_id)->first()->bed_id),
            'room_id' => (Bed::find($this->bed_id)->first()->room_id),
            'risk_level' => $this->risk_level,
        ];
    }
}
