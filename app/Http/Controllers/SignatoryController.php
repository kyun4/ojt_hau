<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Signatory;

class SignatoryController extends Controller
{
    public function signatories(){
        $signatory = Signatory::where('school_id',Auth::user()->profile->school_id)->get();
    }
}
