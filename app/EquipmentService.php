<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentService extends Model
{
    //
    protected $fillable=['id','inventario','nombre','marca','modelo','laboratorio','descripcion','capacidad','funcionalidad','trabajos','lineas','servicios','grado','certificaciones','carrera','university_service_id'];

    public function universityService(){
        return $this->belongsTo('App\UniversitySerice');
    }
    
    public function equipoImagens(){
        return $this->hasMany('App\EquipoImagen');
    }
}
