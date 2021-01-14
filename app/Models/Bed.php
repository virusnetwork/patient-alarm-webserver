<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    public function room()
    {
        return $this->hasOne('App\Models\Room');
    }
}
