<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    public function profile(){
        return $this->hasOne('App\Profile','id','profile_id');
    }
    public function student(){
        return $this->hasOne('App\Student','id','student_id');
    }
    public function role(){
        return $this->hasOne('App\Role','id','role_id');
    }
}
