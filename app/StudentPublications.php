<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentPublications extends Model
{
    //
    protected $table = "St_Publications";
    protected $fillable =['title', 'public', 'date', 'url', 'description', 'student_id'];
    public $timestamps = false;
}
