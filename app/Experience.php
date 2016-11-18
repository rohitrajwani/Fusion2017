<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    //
    protected $table="experience";
	 public function customer(){
    	return $this->belongsTo(Personal::class);
    }
}
