<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
        public function datos(){
        return $this->belongsTo('App\User','user_id');
    }
}
