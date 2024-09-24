<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentMonitoring extends Model
{
    public function student(){
        return $this->hasOne('App\Student','id','student_id');
    }
}
