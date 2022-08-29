<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    //
    protected $fillable=['linea','carrera_id','university_id'];
    
    public function university(){
        return $this->belongsTo('App\Linea');
    }
}
