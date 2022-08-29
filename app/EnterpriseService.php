<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnterpriseService extends Model
{
   protected $fillable = [
        'name', 'description', 'type', 'enterprise_id',
    ];
    
    public function enterprise(){
        return $this->belongsTo("App\Enterprise");
    }
    
    public function university(){
        return $this->belongsToMany("App\University")->withTimestamps();
    }
      public function universities(){
        return $this->belongsToMany("App\University")->withTimestamps();
    }
    
  /*  public function university()
    {
        return $this->hasOne('App\University','user_id');
    }*/
}
