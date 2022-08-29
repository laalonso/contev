<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'requeriments', 'position', 'type', 'description', 'test_link', 'enterprise_id',
    ];

    public function enterprise()
    {
        return $this->belongsTo('App\Enterprise', 'enterprise_id');
    }
    
    //aqui modifique
    public function students(){
        return $this->belongsToMany('App\Student')->withTimestamps();
    }
    
    
///agregue esto
     public function student_vacancy(){
        return $this->belongsToMany('App\VacancyStudent')->withTimestamps();    
    }
    
    //haha
 public function university(){
        return $this->belongsToMany("App\University")->withTimestamps();
        
    }
    
    ////aquii
      public function user(){
        return $this->belongsTo('App\User');
    }
    
      public function programs()
    {
        return $this->belongsToMany('App\Program', 'program_students', 'student_id','program_id')->withTimestamps();
    }

    public function projects()
    {
        return $this->belongsToMany('App\Project', 'project_students', 'student_id', 'project_id')->withTimestamps();
    }
    
}
