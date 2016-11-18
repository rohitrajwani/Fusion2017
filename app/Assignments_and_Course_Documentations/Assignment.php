<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $table = 'Assignment';
    protected $fillable = ['url_assign', 'course_id','deadline'];
}
