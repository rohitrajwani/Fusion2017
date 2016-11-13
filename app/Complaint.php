<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table = 'visitors_complaint';
    protected $primaryKey = 'complaint_no';
}
