<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assess_assignment extends Model
{
    //
    protected $table = 'Assessment';
    protected $fillable = ['assign_id','student_id','marks'];

}
