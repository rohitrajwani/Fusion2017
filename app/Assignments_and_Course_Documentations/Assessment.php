<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    //

    protected $table = 'Assessment';
    protected $fillable = ['assessment_id','student_id'];

}
