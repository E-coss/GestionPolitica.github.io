<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geolocalizacion extends Model
{
    protected $fillable = [
        'latitude', 'longitude',
    ];
    
    public static function StoreGeolocalizacion($request){
        
        return Geolocalizacion::create([
            'latitude'=>$request->latitud, 
            'longitude'=>$request->longitud,
        ]);
    }
}
