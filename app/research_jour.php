<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class research_jour extends Model
{
     protected $table="research_jour"; //add this here
	   public function customer(){
    	return $this->belongsTo(Personal::class);
    }
}
