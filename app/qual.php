<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class qual extends Model
{
    protected $table="qual";
	public function customer(){
    	return $this->belongsTo(Personal::class);
    }
}
