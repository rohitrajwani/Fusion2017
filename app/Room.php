<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'VH_Rooms';
    protected $primaryKey = 'room_no';
    public $incrementing = false;
}
