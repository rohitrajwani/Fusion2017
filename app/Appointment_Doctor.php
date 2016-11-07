<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment_Doctor extends Model
{

    protected $primaryKey = 'appointment_id';
    protected $table = 'Appointment_Doctor';
    public function doctor(){
      return $this->belongsTo('App\Doctor');
    }
}
