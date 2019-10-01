<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedSocial extends Model
{
    protected $fillable = [
        'facebook', 'email', 'instagram',
    ];
    
    public static function StoreRedes($request){
        
        return RedSocial::create([
            'instagram'=>$request->instagram, 
            'email'=>$request->email,
            'facebook'=>$request->facebook,
        ]);
    }
    
    public static function UpdateRedes($request,$id_redes){
        
     $votantes = RedSocial::findOrFail($id_redes); 
            $votantes->instagram=$request->instagram; 
            $votantes->email=$request->email;
            $votantes->facebook=$request->facebook;
          return   $votantes->save();
        
    }
    
    
}
