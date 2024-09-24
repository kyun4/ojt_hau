<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentEvaluation extends Model
{
    protected $fillable = [
        'student_id',
        'partner_id',
        'job_id',
        'rating_1',
        'rating_2',
        'rating_3',
        'rating_4',
        'rating_5',
        'rating_6',
        'rating_7',
        'rating_8',
        'rating_9',
        'rating_10',
        'rating_11',
        'rating_12',
        'rating_13',
        'rating_14',
        'rating_15',
        'rating_16',
        'rating_17',
        'rating_18',
        'rating_19',
        'rating_20',
        'rating_21',
        'rating_22',
        'rating_23',
        'remarks',
        'date_eval',
        'status',
        'stat',
    ];
}
