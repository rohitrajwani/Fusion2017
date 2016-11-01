<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class research_proj extends Model
{
     protected $table="research_proj";
	  public function customer(){
    	return $this->belongsTo(Personal::class);
    }
}
