<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignar extends Model
{
    protected $fillable = [
        'enterprise_id', 'user_id','id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function enterprise()
    {
        return $this->belongsTo('App\Enterprise');
    }
      public function enterpriseservice()
    {
       //return $this->hasMany('App\EnterpriseService');
         return $this->belongsTo('App\EnterpriseService');
    }


   public function universityServices()
    {
          return $this->belongsToMany('App\UniversityService')->withTimestamps();
    }
}
