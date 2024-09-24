<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function school(){
        return $this->hasOne('App\School','id','school_id');
    }
    public function signatory(){
        return $this->hasOne('App\Signatory','school_id','school_id');
    }
}
