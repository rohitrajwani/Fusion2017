<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visits extends Model
{
     protected $table="foreign_visits";
	  public function customer(){
    	return $this->belongsTo(Personal::class);
    }
}
