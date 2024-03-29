<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function bed()
    {
        return $this->belongsToMany('App\Models\Bed');
    }

    public function ward()
    {
        return $this->hasOne('App\Models\Ward');
    }
}
