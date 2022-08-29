<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
        'university_id', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function enterpriseServices(){
        return $this->belongsToMany('App\EnterpriseService')->withTimestamps();
    }
    
    public function lineas(){
        return $this->hasMany('App\Linea');
    }

}
