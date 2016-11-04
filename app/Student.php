<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = "Student";
    protected $primaryKey = "student_id";
    public $timestamps = false;

    public function compStud() {
    	return $this->hasMany('App\CompanyStudent', 'student_id', 'student_id');  
    }
}
