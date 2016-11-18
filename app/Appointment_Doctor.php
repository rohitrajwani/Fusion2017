<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment_Doctor extends Model
{

    protected $primaryKey = 'appointment_id';
    protected $table = 'appointment_doctor';
    public function doctor(){
      return $this->belongsTo('App\Doctor');
    }
}
