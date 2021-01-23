<?php

namespace App\Http\Resources;

use App\Models\Room;
use Illuminate\Http\Resources\Json\JsonResource;

class WardResource extends JsonResource
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
            'room_ids' => Room::where('ward_id',$this->id)->get('id'),
        ];
    }
}
