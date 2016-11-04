<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table = 'Visitors_Complaint';
    protected $primaryKey = 'complaint_no';
}
