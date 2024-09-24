<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobSpecialization extends Model
{
    public function job(){
        return $this->hasOne('App\Job','id','job_id');
    }
}
