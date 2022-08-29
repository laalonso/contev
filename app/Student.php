<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = [
         'enrollment','personal_email','habilidades', 'cv', 'status', 'programa_id','user_id','university_id','subsistema_id'
    ];

    protected $dates = ['deleted_at'];
    
    public function evaluations()
    {
        return $this->hasMany('App\Evaluation');
    }

    public function programs()
    {
        return $this->belongsToMany('App\Program', 'program_students', 'student_id','program_id')->withTimestamps();
    }

    public function projects()
    {
        return $this->belongsToMany('App\Project', 'project_students', 'student_id', 'project_id')->withTimestamps();
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function test(){
        return $this->hasOne('App\Test');
    }
    public function vacancies(){
        return $this->belongsToMany('App\Vacancy')->withTimestamps();
    }
}
