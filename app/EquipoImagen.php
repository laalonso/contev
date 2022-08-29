<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipoImagen extends Model
{
    //
    protected $fillable=['img','equipment_service_id'];
    
    public function equipmentService(){
        return $this->belongsTo("App\EquipmentService");
    }
}
