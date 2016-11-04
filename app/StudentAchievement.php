<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAchievement extends Model
{
    protected $table = "St_Achievement";
    protected $fillable =['org', 'event_name', 'year', 'result', 'student_id'];
    public $timestamps = false;
}
