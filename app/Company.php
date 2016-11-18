<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $table = "Company";
    protected $fillable = ['company_id', 'name', 'min_qualification', 'eligibility_criteria', 'company_type', 'package', 'arrival_date'];
    protected $primaryKey = "company_id";
    public $timestamps = false;


    public function compStud() {
    	return $this->hasMany('App\CompanyStudent', 'company_id', 'company_id');  
    }
}
