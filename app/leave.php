<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leave extends Model
{
    
    protected $table ='student_leave_application';
    protected $primaryKey = ['student_id','leave_app_id'];
    public $incrementing = false;
}
