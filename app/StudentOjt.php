<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentOjt extends Model
{
    protected $fillable = [
        'reflection',
        'certificate',
    ];
    public function student(){
        return $this->hasOne('App\Student','id','student_id');
    }
    public function job(){
        return $this->hasOne('App\job','id','job_id');
    }
}
