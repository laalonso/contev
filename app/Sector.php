<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    
    protected $fillable=['sector','scian'];
    
    public function subsectors(){
        return $this->belongsToMany('App\Subsector');
    }
}
