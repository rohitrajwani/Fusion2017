<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  protected $table = 'doctor';
  protected $primaryKey = 'staff_id';
  public function staff(){
    return $this->belongsTo('App\Staff');
  }
  public function appointment(){
    return $this->hasMany('App\Appointment_doctor');
  }
}
