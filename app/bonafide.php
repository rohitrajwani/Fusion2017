<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bonafide extends Model
{
    //
    protected $table ='bonafide';
    protected $primaryKey = ['student_id','receipt_no'];
    public $incrementing = false;
}
