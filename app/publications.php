<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publications extends Model
{
     protected $table="publications";
	  public function customer(){
    	return $this->belongsTo(Personal::class);
    }
}
