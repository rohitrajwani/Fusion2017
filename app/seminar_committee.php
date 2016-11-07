<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seminar_committee extends Model
{
    
    protected $table ='seminar_committee';
    protected $primaryKey = 'student_id';
    public $incrementing = false;
}
