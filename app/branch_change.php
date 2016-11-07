<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class branch_change extends Model
{
    protected $table ='branch_change';
    protected $primaryKey = 'student_id';
    public $incrementing = false;
   // public $timestamps = false;
}
