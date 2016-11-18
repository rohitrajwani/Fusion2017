<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourses extends Model
{
    //
    protected $table = "St_Courses";
    protected $fillable =['course', 'auth', 'student_id'];
    public $timestamps = false;
}
