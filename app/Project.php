<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name', 'progress', 'keywords', 'description','imagen', 'university_id',
    ];

    protected $dates = ['deleted_at'];

    public function students()
    {
        return $this->belongsToMany('App\Student', 'project_students', 'project_id', 'student_id')->withTimestamps();
    }

    public function enterprises()
    {
        return $this->belongsToMany('App\Enterprise', 'enterprise_projects', 'project_id', 'enterprise_id')->withTimestamps();
    }

   public function university()
    {
        return $this->hasOne('App\University');
    }
}
