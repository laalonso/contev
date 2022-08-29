<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UniversityService extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'type', 'university_id',
    ];

    protected $dates = ['deleted_at'];


    public function university()
    {
        return $this->hasOne('App\University','user_id');
    }
     public function asignar()
    {
       return $this->belongsToMany('App\Asignar')->withTimestamps();
    }
    public function equipmentServices(){
        return $this->hasMany('App\EquipmentService');
    }


}
