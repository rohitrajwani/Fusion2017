<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class consult extends Model
{
     protected $table="cons_proj";
	  public function customer(){
    	return $this->belongsTo(Personal::class);
    }
}
