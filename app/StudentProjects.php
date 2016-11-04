<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentProjects extends Model
{
    //
    protected $table = "St_Projects";
    protected $fillable =['name', 'url', 'year', 'description', 'student_id'];
    public $timestamps = false;
}
