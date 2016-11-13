<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TA extends Model
{
    protected $table = 'ta';
    protected $primaryKey = 'student_id';
    public $incrementing = false;
  
}