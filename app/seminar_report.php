<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seminar_report extends Model
{
    protected $table ='seminar_report';
    protected $primaryKey = 'student_id';
    public $incrementing = false;
}
