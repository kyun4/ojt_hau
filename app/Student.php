<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // public function specialization_tbl(){
    //     return $this->hasMany('App\StudentSpecialization','student_id');
    // }
    public function skill_tbl(){
        return $this->hasMany('App\StudentSkill','student_id');
    }
    public function work_exp(){
        return $this->hasMany('App\StudentEmployment','student_id');
    }
    public function school(){
        return $this->hasOne('App\School','id','school_id');
    }
    public function ojt(){
        return $this->hasOne('App\StudentOjt','student_id');
    }
    public function applicaitons(){
        return $this->hasOne('App\StudentOjt','student_id');
    }
    public function user(){
        return $this->hasOne('App\User','student_id','id');
    }
}
