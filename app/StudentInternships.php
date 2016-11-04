<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInternships extends Model
{
    //
    protected $table = "St_Internship";
    protected $fillable =['profile', 'org', 'location', 'start_date', 'end_date', 'description', 'student_id'];
    public $timestamps = false;
}
