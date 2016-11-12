<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
   protected $table = 'staff';
   protected $primaryKey = 'staff_id';
   public function doctor(){
     return $this->hasOne('App\Doctor');
   }
}
