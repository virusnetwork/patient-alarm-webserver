<?php

namespace App\Http\Resources;

use App\Models\Bed;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
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
            'bed_id' => Bed::where('room_id',$this->id)->get('id'),
        ];
    }
}
