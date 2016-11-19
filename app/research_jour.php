<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class research_jour extends Model
{
     protected $table="research_jour"; //add this here
         protected $fillable = ['rjpath','faculty_id','author','title','journal_name','j_publisher','pub_date'];
	   public function customer(){
    	return $this->belongsTo(Personal::class);
    }
}
