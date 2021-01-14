<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public function alarm()
    {
        return $this->belongsTo('App\Models\Alarm');
    }

    public function bed()
    {
        return $this->belongsTo('App\Models\Bed');
    }
}
