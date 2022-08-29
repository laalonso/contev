<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descripcion extends Model
{
    use HasFactory;
    
    protected $fillable=['descripcion','scian'];
    
    public function subsectors(){
        return $this->belongsToMany('App\Subsector');
    }
}
