<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentVacancy extends Model
{
 //aqui modifique
    public function student(){
        return $this->belongsToMany('App\Student')->withTimestamps();
        
    }
        public function student_vacancy(){
        return $this->belongsToMany('App\StudentVacancy')->withTimestamps();    
    }
    
}