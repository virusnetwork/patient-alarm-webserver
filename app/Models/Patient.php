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
        return $this->hasOne('App\Models\Bed');
    }

    public function setrisk_levelAttribute($value)
    {
        if ($value < $this->attributes['risk_level']) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'field_name' => 'value must be lower then risk level'
            ]);
            throw $error;
        } else {
            $this->attributes['risk_level'] = $value;
            $this->save();
        }
    }
}
