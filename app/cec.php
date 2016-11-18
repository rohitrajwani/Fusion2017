<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cec extends Model
{
    protected $table ='ce_committee';
    protected $primaryKey = 'student_id';
    public $incrementing = false;
}
