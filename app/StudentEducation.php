<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentEducation extends Model
{
    protected $table = "St_Education";
    protected $fillable =['qualification', 'institute', 'year', 'performance', 'student_id'];
    public $timestamps = false;
}
