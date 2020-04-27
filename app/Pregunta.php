<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    public function mampara()
    {
        return $this->belongsTo('App\Mampara');
    }

    public function respuesta()
    {
        return $this->hasOne('App\Respuesta');
    }
}
