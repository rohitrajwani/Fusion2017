<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class patents extends Model
{
     protected $table="patents";
	  public function customer(){
    	return $this->belongsTo(Personal::class);
    }
}
