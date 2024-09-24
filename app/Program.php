<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    // public function specialization_tbl(){
    //     return $this->hasMany('App\StudentSpecialization','student_id');
    // }
    public function program_table(){
        return $this->hasMany('App\StudentProgram','student_id');
    }
    
}
