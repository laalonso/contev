<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'f_surname', 's_surname', 'phone', 'email', 'password', 'image', 'role_id',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id');
    }

    public function university()
    {
        return $this->hasOne('App\University');
    }
    public function asignar()
    {
        return $this->hasOne('App\Asignar','user_id');
    }
///cambie la ses pos se
    public function enterprise()
    {
        return $this->hasMany('App\Enterprise');
    }
    
     public function enterpriseservice()
    {
        return $this->hasMany('App\EnterpriseService');
    }
     
    public function student(){
        return $this->hasOne('App\Student');
    }
    
        public function vacancy()
    {
        return $this->hasOne('App\Vacancy','user_id');
    }
 
}
