<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInterest extends Model
{
    //
    protected $table = "St_Interest";
    protected $fillable =['interest', 'student_id'];
    public $timestamps = false;
}
