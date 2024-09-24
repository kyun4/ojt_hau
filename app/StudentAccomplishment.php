<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAccomplishment extends Model
{
    function student_data(){
        return $this->hasOne('App\Student','student_id','id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
