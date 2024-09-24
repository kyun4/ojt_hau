<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function signatory(){
        return $this->hasOne('App\Signatory','school_id');
    }
    public function students(){
        return $this->hasMany('App\Student','school_id');
    }
}
?>

