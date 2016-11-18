<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentPatents extends Model
{
    //
    protected $table = "St_Patent";
    protected $fillable =['patent_office', 'application_no', 'title', 'issue_date', 'inventors', 'pat_url', 'description', 'student_id'];
    public $timestamps = false;
}
