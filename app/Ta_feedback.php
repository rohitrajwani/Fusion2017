<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ta_feedback extends Model
{
    protected $table = 'Ta_feedback';
    protected $primaryKey = 'student_id';
    public $incrementing = false;
}
