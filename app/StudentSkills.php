<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSkills extends Model
{
    //
    protected $table = "St_Skills";
    protected $fillable =['skill', 'student_id'];
    public $timestamps = false;
}
