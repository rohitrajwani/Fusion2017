<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentTraining extends Model
{
    //
    protected $table = "St_Training";
    protected $fillable =['org', 'training_name', 'location', 'start_date', 'end_date', 'description', 'student_id'];
    public $timestamps = false;
}
