<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsector extends Model
{
    use HasFactory;
    
    protected $fillable=['subsector','scian'];
    
    public function sectors(){
        return $this->belongsToMany('App\Sector');
    }
    public function descripcions(){
        return $this->belongsToMany('App\Descripcion');
    }
}
