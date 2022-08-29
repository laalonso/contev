<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    protected $fillable = [
        'name', 'phone', 'email', 'description', 'image', 'enterprise_id','user_id','enterprise_id'
    ];
    
    
      public function asignar()
    {
        return $this->belongsTo('App\Asignar');
    }

     public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function enterpriseservices()
    {
       return $this->hasMany('App\EnterpriseService');
    }

    public function addressenterprise()
    {
        return $this->hasOne('App\AddressEnterprise');
    }

    public function vacancies()
    {
        return $this->hasMany('App\Vacancy');
    }

    public function projects()
    {
        return $this->belongsToMany('App\Project', 'enterprise_projects', 'enterprise_id', 'project_id')->withTimestamps();
    }

}
