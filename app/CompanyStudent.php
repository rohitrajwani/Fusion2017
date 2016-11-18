<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyStudent extends Model
{
    //
    protected $table = "Applied_For_Company";
    protected $fillable = ["status_of_placement", "test_result", "student_id", "company_id"];
    public $timestamps = false;

    public function company() {
    	return $this->belongsTo('App\Company');  
    }

    public function student() {
    	return $this->belongsTo('App\Student');  
    }
}
 