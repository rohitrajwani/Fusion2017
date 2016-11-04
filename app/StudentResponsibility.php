<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentResponsibility extends Model
{
    //
    protected $table = "St_Pos_Of_Resp";
    protected $fillable =['org', 'role', 'year', 'student_id'];
    public $timestamps = false;
}
