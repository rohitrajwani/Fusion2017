<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCertifications extends Model
{
    //
    protected $table = "St_Cert";
    protected $fillable =['cert', 'auth', 'year', 'licen', 'url', 'student_id'];
    public $timestamps = false;
}
