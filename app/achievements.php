<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class achievements extends Model
{
     protected $table="achievements";
	  public function customer(){
    	return $this->belongsTo(Personal::class);
    }
}
