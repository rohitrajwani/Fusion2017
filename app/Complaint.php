<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $primaryKey='complaint_id';
    protected $table='hostel_complaint';
}
