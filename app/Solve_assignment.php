<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solve_assignment extends Model
{
    //
    protected $table = 'Solves_Assignment';
    protected $fillable = ['assign_id','student_id','url_sol', 'course_id','deadline'];
}
