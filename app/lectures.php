<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lectures extends Model
{
    //
	protected $table="lectures";
	 public function customer(){
    	return $this->belongsTo(Personal::class);
    }
}
