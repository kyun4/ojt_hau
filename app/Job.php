<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function specialization_tbl(){
        return $this->hasOne('App\Specialization','id','specialization');
    }
    public function job_skills(){
        return $this->hasMany('App\JobSkill','job_id');
    }
}
