<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentResume extends Model
{
    protected $table = "St_Objective";
    protected $fillable =['objective', 'student_id'];
    public $timestamps = false;
}
