<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endvoters extends Model
{
            public function redes(){
        return $this->belongsTo('App\RedSocial','redes_id');
    }
}
