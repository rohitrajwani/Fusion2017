<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $table = 'Ta_claim';
    protected $primaryKey = 'student_id';
    public $incrementing = false;
    
}
