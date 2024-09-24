<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentApplication extends Model
{
    public function student(){
        return $this->hasOne('App\Student','id','student_id');
    }
    public function job(){
        return $this->hasOne('App\Job','id','job_id');
    }
    public function requirement(){
        return $this->hasOne('App\StudentRequirement','student_id','student_id');
    }
}
