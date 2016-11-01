<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    //
	  protected $table="prsnl_details";
     public function qual(){
    	return $this->hasMany(qual::class); 
    }
     public function experience(){
    	return $this->hasMany(Experience::class); 
    }
}
